//estructuras de control

//switch
const metodoPago = 'tarjeta';

switch (metodoPago) {
    case 'tarjeta':
        console.log("metodo de pago con tarjeta");
        break;
    case 'efectivo':
        console.log("metodo de pago con efectivo");
        break;
    case 'cheque':
        console.log("metodo de pago con cheque");
        break;
    default:
        console.log("aun no has pagado");
        break;
}