window.$(document).on('keydown', '#search-box', async ({key}) => {
    if (key === "Enter"){
        const searchForm = window.$("#search-box");
        await axios.get('/', {
            'params':{
                query: searchForm.val()
            }
        }).then((response) => {
            window.location = "/?query="+searchForm.val()
        });
    }
})

window.$(document).on('keyup', '#search-box', async (event) => {
    event.preventDefault();
    const searchForm = window.$("#search-box");
    await axios.get('/search', {
        'params':{
            query: searchForm.val()
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
