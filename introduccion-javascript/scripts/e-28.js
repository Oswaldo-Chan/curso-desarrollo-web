// clases en js

class Producto {
    constructor(nombre, precio) {
        this.nombre = nombre;
        this.precio = precio;
    }

    formatearProducto(){
        return `el producto ${this.nombre} cuesta ${this.precio}`  
    }

    getNombre(){
        return this.nombre;
    }
    
    getPrecio(){
        return this.precio;
    }

    setNombre(_nombre){
        this.nombre = _nombre;
    }
    
    setPrecio(_precio){
        this.precio = _precio;
    }
}

const producto_1 = new Producto('monitor',200);
const producto_2 = new Producto('tablet',50);

console.log(producto_1.formatearProducto());
console.log(producto_2.getNombre());
console.log(producto_2.getPrecio());
producto_2.setPrecio(100);
console.log(producto_2.getPrecio());

//herencia

class Libro extends Producto {
    constructor(nombre, precio, isbn) {
        super(nombre, precio);
        this.isbn = isbn;
    }

    formatearProducto(){
        return `${super.formatearProducto()} y su ISBN es ${this.isbn}`  
    }

    getNombre() {
        return super.getNombre();
    }

    setNombre(_nombre) {
        super.setNombre(_nombre);
    }
}

const libro = new Libro('Javascript tutorial', 120, 1004060240);
console.log(libro.formatearProducto());
console.log(libro.getNombre());
libro.setNombre('javascript la revolucion');
console.log(libro.getNombre());
