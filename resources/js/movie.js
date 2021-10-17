const searchForm = document.getElementById("search-box")

searchForm.addEventListener("keydown", async ({key}) => {
    if (key === "Enter"){
        await axios.get('/', {
            'params':{
                query: searchForm.value
            }
        }).then((response) => {
            window.location = "/?query="+searchForm.value
        });
    }
})

searchForm.addEventListener("keyup", async (event) => {
    event.preventDefault();
    await axios.get('/search', {
        'params':{
            query: searchForm.value
        }
    }).then((response) => {
        const data = response.data;
        const dl = document.getElementById('search-result')
        document.getElementById('search-result').innerHTML = '';
        if(data.length>0)
        {
            data.forEach(sr => dl.appendChild( new Option('',sr.name)))
        }
    }).catch( (error) => {
        return null
    });
})
