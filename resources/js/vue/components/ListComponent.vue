<template>
    <div class="container mx-auto">
        <div class="mt-6 mb-2 px-6 py-4 bg-white shadow-md rounded-md">
        <!-- <router-link :to="{ name: 'save' }">Crear</router-link> -->
        <o-modal v-model:active="confirmDeleteAction">
            <div class="p-4">
            <p>Seguro que quieres eliminar el registro?</p>
        </div>
            <div class="flex flex-row gap-2 bg-gray-100 p-3 text-center">
                <o-button variant="danger" @click="deletePost">Borrar</o-button>
                <o-button @click="confirmDeleteAction = false">Cancelar</o-button>

        </div>
        </o-modal>

        <h1 >Lista de Publicaciones</h1>

        <o-button iconLeft="plus" @click="$router.push({name:'save'})">Crear</o-button>

        <div class="mb-5"> </div>
        <o-table :data="posts.data" :loading="isLoading">
            <section>
                <o-table-column field="id" label="ID" v-slot="p">
                    {{ p.row.id }}
                </o-table-column>
                <hr>
                <o-table-column field="title" label="TITLE" v-slot="p">
                    {{ p.row.title }}
                </o-table-column>
                <hr>
                <o-table-column field="description" label="DESCRIPTION" v-slot="p">
                    {{ p.row.description }}
                </o-table-column>
                <o-table-column field="content" label="CONTENT" v-slot="p">
                    {{ p.row.content }}
                </o-table-column>
                <o-table-column field="posted" label="POSTED" v-slot="p">
                    {{ p.row.posted }}
                </o-table-column>
                <o-table-column field="category" label="CATEGORY ID" v-slot="p">
                    {{ p.row.category.title }}
                </o-table-column>
                <o-table-column field="category" label="Actions" v-slot="p">
                    <router-link class="mr-3 text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-4 py-1.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" :to="{ name: 'save', params:{'slug': p.row.slug} }">Editar</router-link>
                    <o-button iconLeft="delete" variant="danger" size="small" rounded @click="deletePostRow = p; confirmDeleteAction = true" >Borrar</o-button>
                </o-table-column>
            </section>
        </o-table>


    <div class="mb-5"></div>

    <o-pagination
        v-if="posts.data && posts.data.length > 0"
        @change="updatePage"
        :total="posts.total"
        v-model:current="currentPage"
        :range-before="2"
        :range-after="2"
        size="small"
        :simple="false"
        :rounded="true"
        :per-page="posts.per_page"
    ></o-pagination>
</div>
</div>
</template>

<script>
export default {
    data() {
        return {
            posts: [],
            isLoading: true,
            currentPage: 1,
            confirmDeleteAction: false,
            deletePostRow:'',
        };
    },
    mounted() {
        this.listPage();
    },
    methods: {
        updatePage() {
            setTimeout(() => {
                this.listPage();
            }, 100);
        },
        listPage() {
            const config = {
                headers:{
                    Authorization: `Bearer ${this.$root.token}`
                }
            }

            this.isLoading = true;
            this.$axios.get(this.$root.urls.postPaginate+ '?page=' + this.currentPage,config).then((res) => {
                this.posts = res.data;
                this.isLoading = false;
            });
        },

            deletePost() { // Cambia row a post para mayor claridad
                    const config = {
                    headers:{
                        Authorization: `Bearer ${this.$root.token}`
                    }
                }
                this.confirmDeleteAction = false
                this.$axios.delete(this.$root.urls.postDelete + this.deletePostRow.row.id, config)
                this.posts.data.splice(this.deletePostRow.index,1)

                this.$oruga.notification.open({
                    message : 'Borrado Satisfactoriamente',
                    position: 'bottom-right',
                    variant: 'danger',
                    duration:4000,
                    closable:true

                })
        }

    }
}

</script>
