import axios from "axios"

export const submitForm = async (webformId, data) => {
  const token = await axios.get("/session/token")

  const submission = await axios({
    method: "post",
    url: "/webform_rest/submit",
    data: {
      webform_id: webformId,
      ...data,
    },
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-Token": token.data,
    },
  })
  const result = await axios.get(`/webform_rest/${webformId}/submission/${submission.data.sid}`)

  return result.data.entity.uuid[0].value
}
