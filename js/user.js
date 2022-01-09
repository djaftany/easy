import { API_SECRET, HOST, HEADERS } from './var.js'

export const signup = async (user) => {
    const response = await fetch(
        `${HOST}/api/users.php?api_secret=${API_SECRET}`,
        {
            method: 'post',
            headers: HEADERS,
            body: JSON.stringify(user),
        }
    )

    return await response.json()
}

export const signdown = async (email) => {
    const response = await fetch(
        `${HOST}/api/users.php?api_secret=${API_SECRET}&email=${email}`,
        {
            method: 'delete',
            headers: HEADERS,
        }
    )

    return await response.json()
}
