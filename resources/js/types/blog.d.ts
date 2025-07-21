export interface Author {
    id:number
    name:string
    email:string
    bio:string|null
    created_at:string
    updated_at:string
    posts:Post[]
}

export interface Category {
    id:number
    name:string
    slug:string
    description:string|null
    created_at:string
    updated_at:string
    posts:Post[]
}

export interface Post {
    id:number
    author:Author
    category:Category
    tags:Tag[]
    title:string
    slug:string
    body:string
    image:string
    preview:sting
    published_at:string
    created_at:string
    updated_at:string
}

export interface Tag {
    id:number
    name: {en:string}
    slug: {en:string}
}
