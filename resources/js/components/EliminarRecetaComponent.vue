<template>
                                    <button 
                                    type="submit" 
                                    class="btn btn-warning d-block w-100  mb-1"
                                    value="Eliminar"
                                    v-on:click="eliminarReceta"
                                    >Eliminar</button>
</template>

<script>
import Swal from 'sweetalert2'
import axios from 'axios'

export default {
    props: ['receta'],
    mounted(){
        console.log('El id de la receta es: ', this.receta);
    },
    methods: {
        eliminarReceta(){
            // console.log('FECHA>>>', moment(this.fecha).locale('es').format('DD [de] MM [del] YYYY') )
            // return moment(this.fecha).locale('es').format('DD [de] MM [del] YYYY');
            console.log('Se procede a eliminar la receta',this.receta);
            const Swal = require('sweetalert2')
            Swal.fire({
                title: 'Seguro que desea eliminar?',
                text: "porfavor confirma que deseas eliminar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si'
                }).then((result) => {
                if (result.isConfirmed) {

                    //Procedemos a eliminar la receta

                    const params = {
                        id: this.receta
                    };

                    axios.post(`./recetas/${this.receta}` , {params, _method:'delete'})
                    .then(resp => {

                        console.log('Respuesta del servidor: ', resp);

                                            Swal.fire(
                            'Receta eliminada!',
                            'Se elimino la receta',
                            'success'
                            )


                            //Eliminar la receta del DOM (tienes que subir 3 veces de nivel, hasa el tr, para liminarlo)

                            this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);


                    })
                    .catch(err => {
                        console.log('Ocurrio un error en la peticion: ', JSON.stringify(err));
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            
                            })
                    })




                }
                })
        }
    }
}
</script>