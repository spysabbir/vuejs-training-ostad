import { defineStore } from 'pinia'

export const useBlogs = defineStore('blogs', {
  state: () => ({
    blogs: [
      {
        id: 1,
        title: 'Blog 1 Title',
        content: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos tempora voluptas quae beatae ipsam harum. Quidem est consectetur architecto aspernatur quod illo magnam ipsum ullam atque ex officia maiores exercitationem ea necessitatibus nihil veniam dicta perferendis eius quas a molestias laudantium, saepe repudiandae iste. Magnam voluptatum ipsa nobis earum aliquid provident odit, quam beatae voluptates possimus, ea excepturi at modi hic dolore nulla sapiente recusandae quis similique? Provident eligendi accusantium rem odio repudiandae! Nihil mollitia cumque ullam eligendi modi in maiores asperiores assumenda voluptatem, maxime inventore eveniet expedita accusamus vel dolor! Non maxime aperiam eaque natus voluptatum sit, amet veritatis mollitia ratione dignissimos ipsa ducimus necessitatibus obcaecati expedita nulla ut doloribus eligendi, vero repellat placeat. Provident consectetur vitae voluptatibus dolor voluptates culpa sequi nam quam sint. Laudantium aperiam ipsum cupiditate dignissimos ad hic nostrum rem explicabo a? Iste error quam nobis! Veritatis illum quos deleniti, iste dicta dolores rerum adipisci quod velit in sapiente vero consequuntur at eius aliquam nisi eveniet perferendis culpa voluptatibus excepturi, placeat commodi, maxime iusto odio. Hic beatae doloribus facilis, maiores iusto minima voluptates iure, laborum vitae assumenda sed molestias recusandae. Deleniti eligendi fugit, veniam voluptatem illum harum aliquam magnam earum sint odio asperiores aliquid quasi soluta placeat id vero porro esse quod similique sed voluptas a ducimus. Iusto fuga reiciendis ducimus nesciunt provident esse? Et, tempora neque magni id consequuntur perspiciatis. Amet, dolorem sint repudiandae quas perferendis harum cupiditate iure facilis tempora vitae? Dignissimos recusandae eius adipisci obcaecati nihil, eveniet et odit atque libero voluptatum praesentium labore dolore accusamus dolor placeat, velit aliquam quasi quaerat. Excepturi nostrum nesciunt tenetur alias fugiat. Expedita velit quo quod explicabo aperiam magnam, ad aliquam ab perspiciatis veritatis ducimus qui quia quasi dolorum non iste vero saepe labore earum! Veritatis quasi quibusdam ipsam in sed similique neque enim repudiandae omnis!',
      },
      {
        id: 2,
        title: 'Blog 2 Title',
        content: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos tempora voluptas quae beatae ipsam harum. Quidem est consectetur architecto aspernatur quod illo magnam ipsum ullam atque ex officia maiores exercitationem ea necessitatibus nihil veniam dicta perferendis eius quas a molestias laudantium, saepe repudiandae iste. Magnam voluptatum ipsa nobis earum aliquid provident odit, quam beatae voluptates possimus, ea excepturi at modi hic dolore nulla sapiente recusandae quis similique? Provident eligendi accusantium rem odio repudiandae! Nihil mollitia cumque ullam eligendi modi in maiores asperiores assumenda voluptatem, maxime inventore eveniet expedita accusamus vel dolor! Non maxime aperiam eaque natus voluptatum sit, amet veritatis mollitia ratione dignissimos ipsa ducimus necessitatibus obcaecati expedita nulla ut doloribus eligendi, vero repellat placeat. Provident consectetur vitae voluptatibus dolor voluptates culpa sequi nam quam sint. Laudantium aperiam ipsum cupiditate dignissimos ad hic nostrum rem explicabo a? Iste error quam nobis! Veritatis illum quos deleniti, iste dicta dolores rerum adipisci quod velit in sapiente vero consequuntur at eius aliquam nisi eveniet perferendis culpa voluptatibus excepturi, placeat commodi, maxime iusto odio. Hic beatae doloribus facilis, maiores iusto minima voluptates iure, laborum vitae assumenda sed molestias recusandae. Deleniti eligendi fugit, veniam voluptatem illum harum aliquam magnam earum sint odio asperiores aliquid quasi soluta placeat id vero porro esse quod similique sed voluptas a ducimus. Iusto fuga reiciendis ducimus nesciunt provident esse? Et, tempora neque magni id consequuntur perspiciatis. Amet, dolorem sint repudiandae quas perferendis harum cupiditate iure facilis tempora vitae? Dignissimos recusandae eius adipisci obcaecati nihil, eveniet et odit atque libero voluptatum praesentium labore dolore accusamus dolor placeat, velit aliquam quasi quaerat. Excepturi nostrum nesciunt tenetur alias fugiat. Expedita velit quo quod explicabo aperiam magnam, ad aliquam ab perspiciatis veritatis ducimus qui quia quasi dolorum non iste vero saepe labore earum! Veritatis quasi quibusdam ipsam in sed similique neque enim repudiandae omnis!',
      },
    ],
    nextId: 3,
  }),
  getters: {
    getBlogs() {
      return this.blogs
    },
    getBlogById: (state) => (id) => {
      return state.blogs.find((blog) => blog.id === id)
    },
  },
  actions: {
    addBlog(blog) {
      this.blogs.push({ ...blog, id: this.nextId++ })
    },
    deleteBlog(id) {
      this.blogs = this.blogs.filter((blog) => blog.id !== id)
    },
    updateBlog(blog) {
      const index = this.blogs.findIndex((b) => b.id === blog.id)
      this.blogs[index] = blog
    },
  },
})