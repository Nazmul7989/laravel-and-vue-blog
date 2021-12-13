import home from "../../components/admin/home";

//Category
import category from "../../components/admin/category/index";
import createCategory from "../../components/admin/category/create";
import editCategory from "../../components/admin/category/edit";

//Post
import post from "../../components/admin/post/index";
import createPost from "../../components/admin/post/create";
import editPost from "../../components/admin/post/edit";

//Contact Message
import contact from "../../components/admin/contact/index";


export const routes= [
    {
        path: '/home',
        component: home,
        name: 'home'
    },

    //Category route
    {
        path: '/category-list',
        component: category,
        name: 'category'
    },
    {
        path: '/category/create',
        component: createCategory,
        name: 'create-category'
    },
    {
        path: '/edit-category',
        component: editCategory,
        name: 'edit-category'
    },

    //Post route
    {
        path: '/post-list',
        component: post,
        name: 'post'
    },
    {
        path: '/post/create',
        component: createPost,
        name: 'create-post'
    },
    {
        path: '/edit-post',
        component: editPost,
        name: 'edit-post'
    },
    {
        path: '/contact-list',
        component: contact,
        name: 'contact-list'
    },




]
