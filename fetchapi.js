async function bdPostData(url = "", formData = {}) {
    const response = await fetch(url, {
        method: "POST",
        mode: "cors",
        cache: "no-cache",
        credentials: "same-origin",
        // headers: {
        // "Content-Type": "application/json",
        // 'Content-Type': 'application/x-www-form-urlencoded',
        // },
        redirect: "error",
        referrerPolicy: "no-referrer",
        // body: JSON.stringify(data),
        body: formData,
    });
    return response.json();
}

/*
const apiUrl = "<?= $base_url ?>index.cgi";
var formData = new FormData()
formData.append("a", "tasks-api-fetchProjectData")

bdPostData(apiUrl,formData).then((response) => {
    console.log(response);
});
*/


function e$(eid){
    return document.getElementById(eid)
}