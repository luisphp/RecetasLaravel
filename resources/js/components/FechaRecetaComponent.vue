<template>
    <span >{{formatearFecha}}</span>
</template>

<script>

export default {
    props: ['fecha'],
    mounted(){
        console.log('Se monto el componente');
    },
    computed: {
        formatearFecha(){
            console.log('FECHA>>>', moment(this.fecha).locale('es').format('DD [de] MM [del] YYYY') )
            return moment(this.fecha).locale('es').format('DD [de] MM [del] YYYY');
        }
    }
}
</script>
