
jQuery('.e-search-specialities').on('change',function(e){
    e.preventDefault()
    const specialityName = jQuery(this).val()
    window.location.href = 'speciality/'+specialityName
})
jQuery('.e-search-specialities').selectize({
    score:function(search){
        return function (option)
    {
        let options = option.text.substring(search.length,0)
        if(search.indexOf(options.toLowerCase())==0) return 1
        return 0
    }}
});