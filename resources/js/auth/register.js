import { showToast, showToastDanger } from '../toast/toastify.js'
import { clearErrors, handleServerErrors } from './clearErrors.js'

const registerForm = document.getElementById('registerForm')
if (registerForm) {
    registerForm.addEventListener('submit', async (e) => {
        e.preventDefault()
        clearErrors(registerForm) // clear lỗi
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
            handleServerErrors(res, result, registerForm)
            showToast(result.message)
            registerForm.reset()
            setTimeout(() => {
                window.location.href = '/'
            }, 2000);
        } catch (error) {
            showToastDanger(error.message)
        }
    })
}
