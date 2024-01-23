$(document).ready(function() {
    // Products Form Validation
     $('#productForm').bootstrapValidator({
        excluded: [':disabled'],
        fields: {
            company_id: {
                validators: {
                    notEmpty: {
                        message: 'Company is required'
                    }
                }
            },
            company_profile_id: {
                validators: {
                    notEmpty: {
                        message: 'Company profile required'
                    }
                }
            },
          
            title: {
                validators: {
                    notEmpty: {
                        message: 'Title is required'
                    }
                }
            },
            category_id: {
                validators: {
                    notEmpty: {
                        message: 'Category is required'
                    }
                }
            },
            alt_tag: {
                validators: {
                    notEmpty: {
                        message: 'You must add Alt tag name'
                    }
                }
            },
            title_tag: {
                validators: {
                    notEmpty: {
                        message: 'You must add Title tag name'
                    }
                }
            },
            url: {
                validators: {
                    notEmpty: {
                        message: 'You must add URL name'
                    }
                }
            },
        
        }
    });

// PressReleases Form Validation
$('#pressForm').bootstrapValidator({
        excluded: [':disabled'],
        fields: {
            company_id: {
                validators: {
                    notEmpty: {
                        message: 'Company is required'
                    }
                }
            },
            company_profile_id: {
                validators: {
                    notEmpty: {
                        message: 'Company profile required'
                    }
                }
            },
          
            title: {
                validators: {
                    notEmpty: {
                        message: 'Title is required'
                    }
                }
            },
         
            alt_tag: {
                validators: {
                    notEmpty: {
                        message: 'You must add Alt tag name'
                    }
                }
            },
            title_tag: {
                validators: {
                    notEmpty: {
                        message: 'You must add Title tag name'
                    }
                }
            },
          
 
        }
    });
// PressReleases Form Validation
$('#whitepapersForm').bootstrapValidator({
        excluded: [':disabled'],
        fields: {
            company_id: {
                validators: {
                    notEmpty: {
                        message: 'Company is required'
                    }
                }
            },
            company_profile_id: {
                validators: {
                    notEmpty: {
                        message: 'Company profile required'
                    }
                }
            },
          
            title: {
                validators: {
                    notEmpty: {
                        message: 'Title is required'
                    }
                }
            },
         
            alt_tag: {
                validators: {
                    notEmpty: {
                        message: 'You must add Alt tag name'
                    }
                }
            },
            title_tag: {
                validators: {
                    notEmpty: {
                        message: 'You must add Title tag name'
                    }
                }
            },
          
 
        }
    });


// catalogForm Form Validation
$('#catalogForm').bootstrapValidator({
        excluded: [':disabled'],
        fields: {
            company_id: {
                validators: {
                    notEmpty: {
                        message: 'Company is required'
                    }
                }
            },
            company_profile_id: {
                validators: {
                    notEmpty: {
                        message: 'Company profile required'
                    }
                }
            },
          
            title: {
                validators: {
                    notEmpty: {
                        message: 'Title is required'
                    }
                }
            },
         
            alt_tag: {
                validators: {
                    notEmpty: {
                        message: 'You must add Alt tag name'
                    }
                }
            },
            title_tag: {
                validators: {
                    notEmpty: {
                        message: 'You must add Title tag name'
                    }
                }
            },
          
 
        }
    });

// Video Form Validation
$('#videoForm').bootstrapValidator({
        excluded: [':disabled'],
        fields: {
            company_id: {
                validators: {
                    notEmpty: {
                        message: 'Company is required'
                    }
                }
            },
            company_profile_id: {
                validators: {
                    notEmpty: {
                        message: 'Company profile required'
                    }
                }
            },
          
            title: {
                validators: {
                    notEmpty: {
                        message: 'Title is required'
                    }
                }
            },
         
            video: {
                validators: {
                    notEmpty: {
                        message: 'You must add Video'
                    }
                }
            },
          
        }
    });

//Ticket Form
$('#ticketForm').bootstrapValidator({
        excluded: [':disabled'],
        fields: {
            subject: {
                validators: {
                    notEmpty: {
                        message: 'Subject is required'
                    }
                }
            },
            description: {
                validators: {
                    notEmpty: {
                        message: 'Please enter message'
                    }
                }
            },                     
        }
    });
   $('.panel-group').on('hidden.bs.collapse', toggleIcon);
   $('.panel-group').on('shown.bs.collapse', toggleIcon);

   function toggleIcon(e) {
    $(e.target)
        .closest('.panel').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
    }
});