<template lang="">
    <div >


        <router-view> </router-view>
    </div>
</template>

<script>
    export default{
        data(){
            return{
            urls: {
                postUpload:'/api/post/upload/',
                postPatch:'/api/post/',
                postPost:'/api/post/',
                getPostBySlug:'/api/post/slug/',
                getCategoriesAll:'/api/category/all',
                postDelete:'/api/post/',
                postPaginate:'/api/post/',

            }
        }
        },
    }
</script>
