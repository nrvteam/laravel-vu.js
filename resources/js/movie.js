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

window.$(document).on('show.bs.modal', '#modal-movie', function (event) {
    console.log('modal-movie loaded')
    const button = window.$(event.relatedTarget);
    const movieId = button.data('movie-id');
    const modal = window.$(this);
    modal.find('#movie-id').val(movieId);
    modal.find('.modal-title').text('Detail of the movie');
    modal.find('.modal-movie-image').attr('src', button.parents('tr').children('.movie-image').text());
    modal.find('.modal-movie-title').text(button.parents('tr').children('.movie-name').text());
    modal.find('.modal-movie-genre').text("Genre:"  + button.parents('tr').children('.movie-genre').text());
    modal.find('.modal-movie-description').text("Description:"  + button.parents('tr').children('.movie-description').text());
});
