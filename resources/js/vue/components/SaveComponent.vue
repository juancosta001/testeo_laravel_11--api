<template>
    <div class="container mx-auto">
        <div class="mt-6 mb-2 px-6 py-4 bg-white shadow-md rounded-md">
    <h1 v-if="post">Modificar Registro  <span class="font-bold">{{ post.title }} </span></h1>
    <h1 v-else="post">Crear Registro </h1>


    <div class="grid grid-cols-2 gap-3">
        <div class="col-span-2">
        <o-field label="title" :variant="errors.title ? 'danger' : 'primary'" :message="errors.title">
            <o-input  v-model="form.title"></o-input>
        </o-field>
    </div>

        <o-field label="content" :variant="errors.content ? 'danger' : 'primary'" :message="errors.content">
            <o-input v-model="form.content"  type="textarea" ></o-input>
        </o-field>
        <o-field label="description" :variant="errors.description ? 'danger' : 'primary'" :message="errors.description">
            <o-input v-model="form.description" type="textarea" ></o-input>
        </o-field>
        <o-field label="slug" :variant="errors.slug ? 'danger' : 'primary'" :message="errors.slug">
            <o-input  v-model="form.slug"></o-input>
        </o-field>
        <o-field label="Posted" :variant="errors.posted ? 'danger' : 'primary'" :message="errors.posted">
            <o-select v-model="form.posted" placeholder="Elegir una opcion">
                <option value="yes">Yes</option>
                <option value="not">No</option>
            </o-select>
        </o-field>
        <o-field label="Category" :variant="errors.category_id ? 'danger' : 'primary'" :message="errors.category_id">
            <o-select placeholder="Elegir una opcion" v-model="form.category_id" >
                <option value=""></option>
                <option v-for="c in categories" v-bind:key="c.id" :value="c.id"> {{ c.title }}</option>
            </o-select>
        </o-field>


    </div>
    <div class="mt-3">
    <o-button  variant="primary" @click="send">Enviar</o-button>

        <div class="flex gap-2 mt-3" v-if="post">
        <o-field :message="fileError" :variant="fileError ? 'danger' : 'primary'">
            <o-upload v-model="file">
                <o-button  tag="upload-tag"  variant="primary" >
                    <o-icon icon="upload"> </o-icon>
                    <span>Clickea para Alzar</span>
                </o-button>
            </o-upload>
        </o-field>

        <o-button icon-left="upload" @click="upload">
            Cargar
        </o-button>
    </div>
</div>

        <h3>Drag and Drop</h3>
        <div class="flex gap-2">
            <o-field :message="fileError" :variant="fileError ? 'danger' : 'primary'">
            <o-upload
                v-model="filesDad"
                multiple
                drag-drop >

                <section>
                    <o-icon icon="upload"></o-icon>
                    <span>Drag and drop area</span>
                </section>
            </o-upload>
            </o-field>
            <span v-for="(file,index) in filesDad" :key="index">
                {{ file.name }}
            </span>
  </div>
</div>
</div>
</template>
    <script>
        export default{
            async mounted() {
                //await es cuando es una peticion asincrona, porque en este caso se usa una peticion a una api
                if(this.$route.params.slug){
                    this.post = await this.$axios.get(this.$root.urls.getPostBySlug + this.$route.params.slug)
                    this.post = this.post.data
                    this.initPost()
                }

                console.log('Save')
                this.getCategory()
            },
            data(){
                return{
                    post:'',
                    form:{
                        title:'',
                        slug:'',
                        description:'',
                        content:'',
                        category_id:'',
                        posted:'',

                    },
                    errors:{
                            title:'',
                            slug:'',
                            description:'',
                            content:'',
                            category_id:'',
                            posted:''
                        },
                    fileError:'',
                    filesDad:[], //files dag an drop
                    file: null,
                    categories:[]
                }
            },
            methods:{


                initPost(){
                    this.form.title = this.post.title
                    this.form.content = this.post.content
                    this.form.description = this.post.description
                    this.form.slug = this.post.slug
                    this.form.posted = this.post.posted
                    this.form.category_id = this.post.category_id
                },

                upload(){

                    this.fileError=''
                    const formData = new FormData()
                    formData.append('image',this.file)
                    this.$axios.post( this.$root.urls.postUpload  + this.post.id, formData,{

                        headers:{
                            'Content-Type' : 'multipart/form-data',
                            Authorization: `Bearer ${this.$root.token}`
                        }

                        //el uso  del then es cuando todo ya esta bien, como pa finalizar
                    }).then((res)=>{
                        this.$oruga.notification.open({
                            message : 'la imagen fue alzada correctamente',
                            position: 'bottom-right',
                            duration:4000,
                            closable:true

                     })
                    }).catch((error)=>{ //y catch es cuando algo no esta bien
                        this.$oruga.notification.open({
                            message : 'Hubo un error al alzar el archivo',
                            variant:'danger',
                            position: 'bottom-right',
                            duration:4000,
                            closable:true
                     })
                        this.fileError=error.response.data.message;
                    })
                },
                cleanErrorsForm(){
                    this.errors.title = ''
                    this.errors.posted = ''
                    this.errors.description = ''
                    this.errors.slug = ''
                    this.errors.content = ''
                    this.errors.category_id = ''


                },
                getCategory(){
                    this.$axios.get(this.$root.urls.getCategoriesAll).then((res) => {
                        this.categories = res.data
                    })
                },
                send(){
                    this.cleanErrorsForm()
                    const config = {
                    headers:{
                        Authorization: `Bearer ${this.$root.token}`
                        }
                    }
                    if(this.post == ''){

                        this.$axios.post(this.$root.urls.postPost , this.form, config).then(res => {
                        console.log(res)
                        this.$oruga.notification.open({
                            message : 'Creado Satisfactoriamente',
                            position: 'bottom-right',
                            duration:4000,
                            closable:true

                     })
                    }).catch(error => {
                        //create
                        if(error.response.data.errors.title){
                            this.errors.title = error.response.data.errors.title[0]
                        }
                        if(error.response.data.errors.slug){
                            this.errors.slug = error.response.data.errors.slug[0]
                        }
                        if(error.response.data.errors.description){
                            this.errors.description = error.response.data.errors.description[0]
                        }
                        if(error.response.data.errors.posted){
                            this.errors.posted = error.response.data.errors.posted[0]
                        }
                        if(error.response.data.errors.content){
                            this.errors.content = error.response.data.errors.content[0]
                        }
                        if(error.response.data.errors.category_id){
                            this.errors.category_id = error.response.data.errors.category_id[0]
                        }
                    })
                    } else{
                        //update
                        this.$axios.patch(this.$root.urls.postPatch + this.post.id, this.form,config).then(res => {
                        console.log(res)
                        this.$oruga.notification.open({
                            message : 'Modificado Satisfactoriamente',
                            position: 'bottom-right',
                            duration:4000,
                            closable:true

                     })
                    }).catch(error => {
                        if(error.response.data.errors.title){
                            this.errors.title = error.response.data.errors.title[0]
                        }
                        if(error.response.data.errors.slug){
                            this.errors.slug = error.response.data.errors.slug[0]
                        }
                        if(error.response.data.errors.description){
                            this.errors.description = error.response.data.errors.description[0]
                        }
                        if(error.response.data.errors.posted){
                            this.errors.posted = error.response.data.errors.posted[0]
                        }
                        if(error.response.data.errors.content){
                            this.errors.content = error.response.data.errors.content[0]
                        }
                        if(error.response.data.errors.category_id){
                            this.errors.category_id = error.response.data.errors.category_id[0]
                        }
                    })
                    }


                    }
            },
        watch:{
            filesDad:{
                handler(val){
                    // return console.log(val[val.length-1])
                    this.fileError=''
                    const formData = new FormData()
                    formData.append('image',val[val.length-1])
                    this.$axios.post(this.$root.urls.postUpload + this.post.id, formData,{

                        headers:{
                            'Content-Type' : 'multipart/form-data'
                        }

                        //el uso  del then es cuando todo ya esta bien, como pa finalizar
                    }).then((res)=>{
                        this.$oruga.notification.open({
                            message : 'la imagen fue alzada correctamente',
                            position: 'bottom-right',
                            duration:4000,
                            closable:true

                     })
                    }).catch((error)=>{ //y catch es cuando algo no esta bien
                        this.$oruga.notification.open({
                            message : 'Hubo un error al alzar el archivo',
                            variant:'danger',
                            position: 'bottom-right',
                            duration:4000,
                            closable:true
                     })
                        this.fileError=error.response.data.message;
                    })
                },
                deep: true
            }
        }
        }
    </script>

