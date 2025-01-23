<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-md">
    <form @submit.prevent="submit">
        <div class="col-span-2">
            <o-field label="Username" :variant="errors.login ? 'danger' : 'primary'" :message="errors.login">
                <o-input v-model="form.email"></o-input>
            </o-field>
            <o-field label="Password" :variant="errors.login ? 'danger' : 'primary'" :message="errors.login">
                <o-input v-model="form.password" type="password"></o-input>
            </o-field>
        </div>
        <o-button :disabled="disabledBotton" type="submit" variant="primary">Enviar</o-button>

    </form>
</div>
</div>

</template>

<script>
import axios from 'axios';

export default {
    created(){
            if(this.$root.isLoggedIn){
                this.$router.push({name:'list'})
            }
        },
    data() {
        return {
            disabledBotton:false,
            form: {
                email: 'admin@gmail.com',
                password: '12345678',
            },
            errors: {
                login: '',
            },
        };
    },
    mounted() {
    console.log('LoginComponent montado');
     },
    methods: {

        cleanErrorsForm(){
            this.errors.login=''
        },

        submit() {
            this.cleanErrorsForm()
            this.disabledBotton=true
        axios.get('/sanctum/csrf-cookie') // Inicializar cookies
            .then(() => {
                axios.post('/api/user/login', this.form) // URL con el prefijo `/api`
                    .then(response => {
                        this.$root.setCookieAuth({
                            isLoggedIn: response.data.isLoggedIn,
                            token: response.data.token,
                            user: response.data.user,
                        })

                        setTimeout(() =>(window.location.href= '/vue'),1000)
                        // this.disabledBotton = false
                        this.$oruga.notification.open({
                            message:'Inicio de Sesion Exitoso',
                            position:'bottom-right',
                            duration:1000,
                            closable: true
                        })
                    })
                    .catch(error => {
                        this.disabledBotton=false
                        console.error(this.errors.login = error.response.data);
                        this.errors.login = error.response?.data?.message || 'La contraseña o el correo son incorrectos';
                    });
            })
            .catch(error => {
                console.error('Error al obtener CSRF cookie:', error.message);
            });
    },
},
        };
</script>
