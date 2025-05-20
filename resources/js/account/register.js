import { showToast, showToastDanger } from '../toast/toastify.js'
const registerForm = document.getElementById('registerForm')

//reset errors
function clearErrors() {
    const errorMessage = registerForm.querySelectorAll('.error-message')
    errorMessage.forEach(el => el.textContent = '')

    const inputsMessage = registerForm.querySelectorAll('input')
    inputsMessage.forEach(input => input.classList.remove('error'))
}

registerForm.addEventListener('submit', async (e) => {
    e.preventDefault()
    clearErrors() // clear lỗi
    const formData = new FormData(registerForm)

    try {
        const res = await fetch('/register', {
            'method': 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-Requested-With': 'XMLHttpRequest',
            },
            body: formData
        })

        const result = await res.json()
        if (!res.ok) {
            if (result.errors) {
                for (const field in result.errors) {
                    const errDiv = document.getElementById(`error-${field}`)
                    errDiv ? errDiv.textContent = result.errors[field][0] : ''

                    const input = registerForm.querySelector(`[name="${field}"]`)
                    input ? input.classList.add('error') : ''
                }
                throw new Error('Dữ liệu không hợp lệ, vui lòng thử lại')
            } else {
                throw new Error(result.message || 'Đã có lỗi xảy ra.')
            }
        }

        showToast(result.message)
        registerForm.reset()
    } catch (error) {
        showToastDanger(error.message)
    }
})
