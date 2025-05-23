import { showToast, showToastDanger } from '../toast/toastify.js'
import { clearErrors, handleServerErrors } from './clearErrors.js'

document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm')
    if (loginForm) {
        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault()
            clearErrors(loginForm) // clear lỗi
            const formData = new FormData(loginForm)

            try {
                const res = await fetch('/login', {
                    'method': 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    credentials: 'include',
                    body: formData
                })

                const result = await res.json()
                handleServerErrors(res, result, loginForm)
                showToast(result.message)
                loginForm.reset()
                setTimeout(() => {
                    window.location.href = result.redirectRoute
                }, 2000);
            } catch (error) {
                showToastDanger(error.message)
            }
        })
    }
})
