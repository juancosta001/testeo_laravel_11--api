<template lang="">
    <div>
        <nav class='bg-white border-b border-gray'>
            <header class='max-w-auto px-4 sm:px-6 lg:px-8'>
                <div class='flex justify-between'>
                    <div class='flex items-center'>
                        <!-- Aquí importamos el logo -->
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="60"
                            height="45"
                            viewBox="0 0 262 227"
                            >
                            <g id="Vue.js_logo_strokes" fill="none" fill-rule="evenodd">
                                <g id="Path-2">
                                <polyline
                                    class="outer"
                                    stroke="#4B8"
                                    stroke-width="46"
                                    points="12.19 -24.031 131 181 250.351 -26.016"
                                />
                                </g>
                                <g id="Path-3" transform="translate(52)">
                                <polyline
                                    class="inner"
                                    stroke="#354"
                                    stroke-width="42"
                                    points="15.797 -14.056 79 94 142.83 -17.863"
                                />
                                </g>
                            </g>
                            </svg>
                    </div>

                    <!-- Contenedor de enlaces y botones -->
                    <div class='max-w-7xl mx-auto py-4 px-4 sm:px-6 flex items-center'>
                        <!-- Enlace de Login -->
                        <router-link :to="{'name': 'login'}" class='inline-flex uppercase border-b-2 text-sm-leading-5 mx-3 px-4 py-1 text-gray-600 text-center font-bold hover:text-gray-900 hover:border-gray-700 hover:-translate-y-1 durarion-150 transition-all' v-if="!$root.isLoggedIn">
                            Login
                        </router-link>

                        <!-- Enlace de List -->
                        <router-link :to="{'name': 'list'}" class='inline-flex uppercase border-b-2 text-sm-leading-5 mx-3 px-4 py-1 text-gray-600 text-center font-bold hover:text-gray-900 hover:border-gray-700 hover:-translate-y-1 durarion-150 transition-all' v-if="$root.isLoggedIn">
                            List
                        </router-link>

                        <!-- Botón de Cerrar Sesión -->
                        <o-button
                            v-if="$root.isLoggedIn"
                            variant="danger"
                            @click="logout"
                            class="mx-3"
                        >
                            Cerrar Sesion
                        </o-button>

                        <qrcode-vue
                            v-if="$root.isLoggedIn"
                            :value="qrValue"
                            :size="75"
                            class="mx-3"
                        ></qrcode-vue>
                    </div>

                    <!-- Avatar y nombre del usuario -->
                    <div class='flex flex-col items-center py-9' v-if='$root.isLoggedIn'>
                        <div class='rounded-full w-9 h-9 bg-blue-300 text-center p-1 font-bold'>  <!-- Avatar -->
                            {{ $root.user.name.substr(0,2).toUpperCase() }}    <!-- Iniciales del nombre -->
                        </div>
                        <p>{{ $root.user.name }}</p>
                    </div>
                </div>
            </header>
        </nav>

        <router-view></router-view>
    </div>
</template>

<script>
import QrcodeVue from 'qrcode.vue';
    export default{
        components:{
            QrcodeVue,
        },
        mounted(){
            if(window.Laravel && window.Laravel.isLoggedIn){
                this.isLoggedIn = true
                this.user = window.Laravel.user
                this.token = window.Laravel.token
                this.fetchQrCode();
              this.$root.setCookieAuth({
                    isLoggedIn: this.isLoggedIn,
                    token: this.token,
                    user: this.user,
                 })
             } else{
                const auth = this.$cookies.get('auth')
                if(auth){
                    this.isLoggedIn = true
                    this.user = auth.user
                    this.token = auth.token
                    //verificacion de si oiko o no el token

                }
             }

            console.log(this.$cookies.get('auth'))
            const config = {
                    headers:{
                        Authorization: `Bearer ${this.$root.token}`
                    }
                }

            // axios.get('/api/user',config).then (response => {
            //     console.log(response.data)
            // })

        },
        methods:{
            setCookieAuth(data){
            this.$cookies.set('auth',data)
        },
        async fetchQrCode() {
        try {
            const response = await this.$axios.get('/api/qr-code'); // Hacer la solicitud HTTP
            this.qrCode = response.data.qrCode; // Asignar el código QR a la variable
        } catch (error) {
            console.error('Error al obtener el código QR:', error);
        }
    },

            logout() {
            const config = {
                headers: {
                    Authorization: `Bearer ${this.$root.token}`, // Utiliza el token almacenado
                },
            };

            axios.post('/api/user/logout', {}, config)
                .then(() => {
                    this.setCookieAuth("");
                    this.isLoggedIn = false;
                    this.user = null;
                    this.token = null;

                    // Redirigir al inicio de sesión o limpiar el estado de la app
                    window.location.href = '/vue/login';
                })
                .catch(error => {
                    console.error('Error al cerrar sesión:', error);
                    // Manejar errores si es necesario
                });
                } },
        data(){
            return{
                isLoggedIn: false,
                user:'',
                token:'',
                qrValue: 'https://github.com/juancosta001',
            urls: {
                postUpload:'/api/post/upload/',
                postPatch:'/api/post/',
                postPost:'/api/post/',
                getPostBySlug:'/api/post/slug/',
                getCategoriesAll: '/api/category/all',
                postDelete:'/api/post/',
                postPaginate:'/api/post/',

            }
        }
        const config = {
            headers:{
                Authorization:''
            }
        }
        },

    }
</script>
