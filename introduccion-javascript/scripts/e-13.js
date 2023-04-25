//spread operator - unir dos objetos

const persona = {
    nombre: "Oswaldo",
    apellido: "Chan",
    edad: 20,
}

const mascota = {
    nombre: 'alana',
    color: "negro"
}


const nuevaPersona = {...persona, ...mascota}
// console.log(nuevaPersona);
// Ojo: al unir intercambia nombre de persona con nombre de mascota

const persona_2 = { //aqui si conserva correctamente las propiedades
    nombres: "Oswaldo Chan",
    edad: 20,
    vivo: true,
    mascota: mascota
}
console.log(persona_2); 