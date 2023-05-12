import { every, isObject, some, xor } from "lodash"

const operations = {
  checked: {
    match(logic, value) {
      return value === logic.checked
    },
  },
  unchecked: {
    match(logic, value) {
      console.log(logic)
      console.log(!(value === logic.unchecked))
      return !(value === logic.unchecked)
    },
  },
  value: {
    match(logic, value) {
      return value === logic.value
    },
  },
  pattern: {
    match(logic, value) {
      return new RegExp(logic.value.pattern).test(value)
    },
  },
  less_equal: {
    match(logic, value) {
      return value <= logic.value
    },
  },
  greater: {
    match(logic, value) {
      return value > logic.value
    },
  },
}

/**
 * @return {boolean}
 * @param rule
 * @param results
 */
export const matchCondition = (condition, results) => {
  let type = Object.keys(condition.logic)[0]

  if (isObject(condition.logic[type])) {
    type = Object.keys(condition.logic[type])[0]
  }

  // match the checkboxes stage[nsw]
  let match = condition.field.match(/\[(.*)\]/)
  let value
  if (match) {
    let key = match[1]
    let field = condition.field.replace(match[0], "")

    if (key && results?.[field]) {
      value = results[field].includes(key)
    }
  } else {
    value = results[condition.field]
  }

  if (!value) {
    return false
  }

  if (!operations.hasOwnProperty(type)) {
    return null
  }

  return operations[type].match(condition.logic, value)
}

/**
 *
 * @param field
 * @param results
 * @return {unknown[]|boolean}
 */
export const processConditions = (field, results) => {
  if (!field.conditions || field.conditions.length < 1) {
    return true
  } else {
    const { state, rules, operator } = field.conditions

    let ands = []
    let ors = []
    for (const rule of rules) {
      ands = []
      for (const singleRule of rule) {
        ands.push(matchCondition(singleRule, results))
      }
      ands.length > 0 && ors.push(every(ands))
    }

    // if we have some ors check if any of them are true
    // @todo deal with enabled/disabled select var
    if (ors.length > 0) {
      if (operator === "xor") {
        return state === "invisible" ? !xor(ors) : xor(ors)
      }

      return state === "invisible" ? !some(ors) : some(ors)
    }
  }

  return false
}
