$(document).ready(function() {
    const url = window.location.origin;
    const countryElem = $('#country-ddl')
    const stateElem = $('#state-ddl')

    const handleFilterChange = (e) => {
        $.ajax({
            type: 'GET',
            url: `${url}/customers?country_code=${countryElem.val()}&phone_state=${stateElem.val()}`,
            success: (res) => {
                $('#example').dataTable().fnClearTable();
                $('#example').dataTable().fnAddData(res.data);
            },
            error: (res) => console.log('Error')
        })
    }

    const renderCountryListOption = (data) => {
        for (let country of data) {
            countryElem.append(`<option value='${country.code}'>${country.name}</option>`)
        }
    }

    const renderCountryList = (e) => {
        $.ajax({
            type: 'GET',
            url: `${url}/api/countries`,
            success: (res) => {
                renderCountryListOption(res)
            },
            error: (res) => console.log('Error')
        })
    }

    renderCountryList()

    countryElem.on('change', handleFilterChange)
    stateElem.on('change', handleFilterChange)

    // to be seperated in initialize function
    $('#example').DataTable( {
        "ajax": `${url}/customers`,
        columns: [
            // { data: "country" },
            // { data: "phone_state" },
            // { data: "country_code"},
            { data: "country"},
            { data: "country_code"},
            { data: "phone"},
            { data: "phone_state"},
        ],
        pageLength: 5,
        lengthMenu: [5, 10, 20, 50, 100],
    } );
} );

