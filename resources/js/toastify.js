import Toastify from 'toastify-js';
import 'toastify-js/src/toastify.css';
export const showToast = (message) => {
    Toastify({
        text: message,
        duration: 3000,
        gravity: "top",
        position: "right",
        style: {
            marginTop: "50px",
            marginRight: "20px",
            background: "#218838",
            color: "#ffffff",
            borderRadius: "12px",
            padding: "16px 60px",
            fontSize: "14px",
            boxShadow: "0 4px 10px rgba(0, 0, 0, 0.1)",
            borderLeft: "6px solid rgb(0, 247, 255)", // tạo điểm nhấn
        },
        close: false,
        stopOnFocus: true,
    }).showToast()
}

export const showToastDanger = (message) => {
    Toastify({
        text: message,
        duration: 3000,
        gravity: "top",
        position: "right",
        style: {
            marginTop: "50px",
            marginRight: "20px",
            background: "#ff8a66",
            color: "#ffffff",
            borderRadius: "12px",
            padding: "12px 24px",
            fontSize: "14px",
            boxShadow: "0 4px 10px rgba(0, 0, 0, 0.1)",
            borderLeft: "6px solid rgb(255, 238, 0)", // tạo điểm nhấn
        },
        close: false,
        stopOnFocus: true,
    }).showToast()
}
