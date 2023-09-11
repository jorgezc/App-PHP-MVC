(function() {
    // Boton para mostrar el modal agregar ocurrencia
    const nuevaOcurrenciaBtn = document.querySelector('#agregar-ocurrencia');
    nuevaOcurrenciaBtn.addEventListener('click', mostrarFormulario);

    function mostrarFormulario() {
        const modal = document.createElement('DIV');
        modal.classList.add('modal');
        modal.innerHTML = `
            <form class="formulario nueva-ocurrencia">
                <legend>Añade una nueva ocurrencia</legend>
                <div class="campo">
                    <label>Ocurrencia</label>
                    <Input
                        type="text"
                        name="ocurrencia"
                        placeholder="Añadir nueva ocurrencia"
                        id="tarea"
                    />
                </div>    
                <div class="opciones">
                    <Input type="submit" class="submit-nueva-ocurrencia" value="Añadir Ocurrencia"/>
                    <button type="button" class="cerrar-modal">cancelar</button>
                </div>
            </form>
             
        
        `;

        setTimeout(() => {
            const formulario = document.querySelector('.formulario');
            formulario.classList.add('animar');
        }, 0);

        modal.addEventListener('click', function(e) {
            e.preventDefault();

            if(e.target.classList.contains('cerrar-modal')) {
                const formulario = document.querySelector('.formulario');
                formulario.classList.add('cerrar');
                setTimeout(() => {
                    modal.remove();
                }, 500);

                
            }
        })


        document.querySelector('body').appendChild(modal);

    }
})();