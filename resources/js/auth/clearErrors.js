// clearErrors.js
export function clearErrors(formElement) {
    const errorMessage = formElement.querySelectorAll('.error-message')
    errorMessage.forEach(el => el.textContent = '')

    const inputs = formElement.querySelectorAll('input')
    inputs.forEach(input => input.classList.remove('error'))
}

// handleServerErrors.js
export function handleServerErrors(res, results, formElement) {
    if (!res.ok) {
        if (results.errors && typeof results.errors === 'object') {
            Object.entries(results.errors).forEach(([field, messages]) => {
                const errDiv = formElement.querySelector(`#error-${field}`)
                if (errDiv) errDiv.textContent = messages[0]

                const input = formElement.querySelector(`[name="${field}"]`)
                if (input) input.classList.add('error')
            })
            throw new Error('Dữ liệu không hợp lệ, vui lòng thử lại')
        } else {
            throw new Error(results.message || 'Đã có lỗi xảy ra.')
        }
    }
}
