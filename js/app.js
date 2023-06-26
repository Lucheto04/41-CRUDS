addEventListener("DOMContentLoaded", async function(e) {
    let conexion = (await fetch('http://localhost/ApolT01-021/41-CRUDS/uploads/chapters'));
    let data = await conexion.json();
    console.log(data);
});