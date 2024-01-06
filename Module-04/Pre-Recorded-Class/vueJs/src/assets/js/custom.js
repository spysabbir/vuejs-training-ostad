const customJsData = {
    message: "Welcome, VueJs 3",
    getDate: function(){
      const date = new Date();
      return date.toDateString()
    },
    tasks: ['Write', 'Check', 'Run']
}

// export { customJsData }
export default customJsData