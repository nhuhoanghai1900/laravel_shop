import { showToast, showToastDanger } from "./toastify";
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
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            const result = await res.json()
            if (!res.ok) {
                showToastDanger(result.message)
            } else {
                showToast(result.message)
                document.querySelector('.cart-items').innerHTML = ''
                document.querySelector('.total-price').textContent = '0đ'
                document.querySelector('.empty-text-cart').style.display = 'block'
            }
        } catch (error) {
            console.log(error);
        }
    })
}
