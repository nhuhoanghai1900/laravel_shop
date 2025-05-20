import { showToast, showToastDanger } from "../toast/toastify";

//xử lý thanh toán
const orderPayment = document.querySelector('#orderPayment')
if (orderPayment) {
    orderPayment.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(orderPayment)

        try {
            const res = await fetch('/order', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: formData
            })

            const result = await res.json()
            if (!res.ok) {
                throw new Error(result.message)
            } else {
                orderPayment.reset()
                showToast(result.message)
                document.querySelector('.cart-items').innerHTML = ''
                document.querySelector('.total-price').textContent = '0đ'
                document.querySelector('.empty-text-cart').style.display = 'block'
                document.querySelector('.cart-header').textContent = '(0)'
                document.querySelector('.total-cart').textContent = 0
                //modal success
                const modalElement = document.getElementById('successModal')
                const successModal = new bootstrap.Modal(modalElement)
                successModal.show()
            }
        } catch (error) {
            console.log(error)
            showToastDanger(error.message)
        }
    })
}
