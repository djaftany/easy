import { signup } from './user.js'

document.forms.namedItem('form').onsubmit = async (e) => {
    e.preventDefault()

    const user = {
        name: document.getElementById('name')?.value,
        email: document.getElementById('email')?.value,
        password: document.getElementById('password')?.value,
    }

    const result = await signup(user)
    console.log(result);
}