/**
 * É o arquivo js ligado a página login.php. É responsável por capurar os dados
 * do usuário e envia-los para a api de forma efetuar  login.
 * 
 */
import { signin } from './auth.js'

document.forms.namedItem('form').onsubmit = async (e) => {
    e.preventDefault()

    const user = {
        email: document.getElementById('email')?.value,
        password: document.getElementById('password')?.value,
    }

    const { token } = await signin(user)

    if (token) {
        const maxAge = new Date(new Date().getTime() + 1000 * 60 * 60 * 24)
        document.cookie = `easy_auth_token=${token}; expires=${maxAge.toUTCString()}`
    } else {
        // Login falhou
    }
}