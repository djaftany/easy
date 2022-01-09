/**
 * É o arquivo js ligado a página new.php. É responsável por capurar os dados
 * do usuário e envia-los para a api.
 * 
 */
import { signup } from './user.js'

document.forms.namedItem('form').onsubmit = async (e) => {
    e.preventDefault()

    const user = {
        name: document.getElementById('name')?.value,
        email: document.getElementById('email')?.value,
        password: document.getElementById('password')?.value,
    }

    const result = await signup(user)

    if (result) {
        // Se tiver criado o usuário.
        // Geralmente só não vai cria-lo caso o email já estiver cadastrado.
    } else {
        // Se não tiver criado o usuário
    }
}