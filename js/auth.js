import { API_SECRET, HOST, HEADERS } from './var.js'

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

export const signout = async (credentials) => {
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