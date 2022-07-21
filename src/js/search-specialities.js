jQuery('.e-search-specialities').on('change',function(e){
    e.preventDefault()
    const specialityName = jQuery(this).val()
    window.location.href = 'speciality/'+specialityName
})