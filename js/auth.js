document.write("<script src='/js/env.js'></script>")
const signin = async (credentials) => {
    const response = await fetch(
        `${HOST}/api/users.php?api_secret=${API_SECRET}`,
        {
            method: 'post',
            headers: HEADERS,
            body: JSON.stringify(credentials),
        }
    )

    return await response.json()
}

const signout = async (credentials) => {
    const response = await fetch(
        `${HOST}/api/users.php?api_secret=${API_SECRET}`,
        {
            method: 'post',
            headers: HEADERS,
            body: JSON.stringify(credentials),
        }
    )

    return await response.json()
}