import { API_SECRET, HOST, HEADERS } from './var.js'

const getCookie = (name) => {
    const cookies = document.cookie

    for (let cookie of cookies) {
        const tokens = cookie.split("=")
        if (tokens[0] == name) return tokens[1]
    }
}

export const signin = async (credentials) => {
    const response = await fetch(
        `${HOST}/api/login.php?api_secret=${API_SECRET}`,
        {
            method: 'post',
            headers: HEADERS,
            body: JSON.stringify(credentials),
        }
    )

    return await response.json()
}

export const signout = async () => {
    const token = getCookie("easy_auth_token")

    const response = await fetch(
        `${HOST}/api/users.php?api_secret=${API_SECRET}&&token=${token}`,
        {
            method: 'post',
            headers: HEADERS,
        }
    )

    return await response.json()
}
