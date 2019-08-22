$(function () {

  $(".phone .wrapper .tab").click(function () {
    $(".phone .wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
    $(".phone .tab_item").hide().eq($(this).index()).fadeIn()
  }).eq(0).addClass("active");

  $(".account_tab .wrapper .tab").click(function () {
    $(".account_tab .wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
    $(".account_tab .tab_item").hide().eq($(this).index()).fadeIn()
  }).eq(0).addClass("active");

  $(".account_story .wrapper2 .tab2").click(function () {
    $(".account_story .wrapper2 .tab2").removeClass("active").eq($(this).index()).addClass("active");
    $(".account_story .tab_item2").hide().eq($(this).index()).fadeIn()
  }).eq(0).addClass("active");

  $('.popup-with-form').magnificPopup({
    type: 'inline',
    preloader: false,
    focus: '#name',
    callbacks: {
      beforeOpen: function () {
        if ($(window).width() < 700) {
          this.st.focus = false;
        } else {
          this.st.focus = '#name';
        }
      }
    }
  });
  $('.popup-with-video').magnificPopup({
    type: 'inline',
    preloader: false,
    focus: '#name',

    callbacks: {
      beforeOpen: function () {
        if ($(window).width() < 700) {
          this.st.focus = false;
        } else {
          this.st.focus = '#name';
        }
      }
    }
  });
});
$(function () {
  $('.btn_menu').click(function () {
    $('.left_menu, .btn_row, .menu ul, .menu ul li').toggleClass('active')
  });
});
$(function () {
  $('.btn_menu2').click(function () {
    $('.category_menu_ul, .category_menu ul, .category_menu ul li, .btn_menu2').toggleClass('active')
  });
});
$(function () {
  $('.filtr').click(function () {
    $('.filter_content, .filter_content .row, .filtr img, .text_filtr, .filtr').toggleClass('active');


  });
});
$('.popup-with-form').magnificPopup({
  type: 'inline',
  preloader: false,
  focus: '#name',

  callbacks: {
    beforeOpen: function () {
      if ($(window).width() < 700) {
        this.st.focus = false;
      } else {
        this.st.focus = '#name';
      }
    }
  }
});
$('.popup-callback').magnificPopup({
  type: 'inline',
  preloader: false,
  focus: '#name',

  callbacks: {
    beforeOpen: function () {
      if ($(window).width() < 700) {
        this.st.focus = false;
      } else {
        this.st.focus = '#name';
      }
    }
  }
});
$(function () {
  $('.btn_massage').click(function () {
    $('.massage, .massage_form, .btn_massage').toggleClass('active')
  });
});
$(function () {
  $('.btn_massage_mobil').click(function () {
    $('.massage, .massage_form, .btn_massage, .btn_massage_mobil').toggleClass('active')
  });
});
$(function () {
  $('.plus').click(function () {
    $(this).toggleClass('active')
  });
});
$("color_filter .wrapper .tab").click(function () {
  $(".color_filter .wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
  $(".color_filter .tab_item").hide().eq($(this).index()).fadeIn()
}).eq(0).addClass("active");
$(".color_filter .wrapper .tab").click(function () {
  $(".color_filter .wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
  $(".color_filter .tab_item").hide().eq($(this).index()).fadeIn()
}).eq(0).addClass("active");
$('.popup-gallery').magnificPopup({
  delegate: 'a',
  type: 'image',
  tLoading: 'Loading image #%curr%...',
  mainClass: 'mfp-img-mobile',
  gallery: {
    enabled: true,
    navigateByImgClick: true,
    preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
  },

});
$(window).on('load', function () {
  var $preloader = $('#preloader'),
    $svg_anm = $preloader.find('#preloader');
  $svg_anm.fadeOut();
  $preloader.delay(500).fadeOut('slow');

});
$('.close-city').click(function () {
  $('.city_popup_box').removeClass('active');
});
$('.city').click(function () {
  $('.city_popup_box').addClass('active');
});


/////////////// FOR DELETE FIRS CONSTRUCTOR LLIDER ON DESCTOP

function deleteSlider() {
  let windowWidt = $(window).width();
  let firstSlider = $('.firstConstructorSlider');
  let appendItem = $('.first-step .data');
  if (windowWidt > 992) {
    firstSlider.detach();
  } else if (windowWidt < 992) {
    firstSlider.appendTo(appendItem[0])
  }
}
$(window).on('load resize', deleteSlider)

// $(function ($) {
//   var allAccordions = $('.accordion div.data');
//   var allAccordionItems = $('.accordion .accordion-item');
//   $('.accordion > .accordion-item').click(function () {
//     if ($(this).hasClass('open')) {
//       $(this).removeClass('open');
//       $(this).next().slideUp("slow");
//     }
//     else {
//       allAccordionItems.removeClass('open');
//       $(this).addClass('open');
//       $(this).next().slideDown("slow");
//       return false;
//     }
//   });
// });


$(".kitchen-slider1").slick({
  prevArrow: '<i class="fas fa-chevron-left"></i>',
  nextArrow: '<i class="fas fa-chevron-right"></i>',
  infinite: false,
  slidesPerRow: 2,
  rows: 2,
  responsive: [
  ]
});



// let acceptTerm = document.getElementById('accept-term')
// acceptTerm.addEventListener('click', () => {
//   let btnToOrder = document.querySelector('.btn-toorder');
//   if (acceptTerm.checked) {
//     btnToOrder.disabled = false;
//   } else {
//     btnToOrder.disabled = true;
//   }
// })


/// => KITCHEN CONFIGURATOR


$(window).on('scroll', function () {
  let price
  let slider;
  if ($(window).width() > 992) {
    price = $('.priceForSizeConfig');
    if (this.scrollY > 350) {
      price.addClass('fixed')
    } else {
      price.removeClass('fixed')
    }
  } else {
    price = $('.priceForSizeConfig.mobile');
    if (this.scrollY > 300) {
      price.addClass('fixed')
    } else {
      price.removeClass('fixed')
    }
  }
});



let checkConfigImg = document.querySelector('.checkConfigImage');
let checkConfigImgMobile = document.querySelector('.checkConfigImage-mobile');
let generalTabConfiguration = Array.from(document.querySelectorAll('.tabModel .custom-radio'));
let generalTabConfigurationInput = Array.from(document.querySelectorAll('input'));
let locationModel = Array.from(document.querySelectorAll('.kitchen-location .custom-radio'));
let sliderImages;
let slider = document.querySelector('.kitchen-slider-desctop .kitchen-slider1');
let twoBlockCounter = 1;

if ($(window).width() > 992) {
  sliderImages = Array.from(document.querySelectorAll('.kitchen-slider-desctop .kitchen-slider1-img'));
} else {
  sliderImages = Array.from(document.querySelectorAll('.kitchen-slider-mobile .kitchen-slider1-img'));
}

generalTabConfigurationInput.forEach(e => e.addEventListener('click', function (event) {
  event.stopPropagation()
}))

generalTabConfiguration.forEach(function (e, i) {
  e.addEventListener('click', function () {
    let configuration = JSON.parse(this.getAttribute('data-configuration'));

    slider.classList.add('hide');
    $('.hideConfigImg').addClass('show');

    if ($(window).width() > 992) {
      checkConfigImg.firstElementChild.setAttribute('src', e.getAttribute('data-src'));
      checkConfigImg.classList.add('show');
    } else {
      checkConfigImgMobile.firstElementChild.setAttribute('src', e.getAttribute('data-src'));
      checkConfigImgMobile.classList.add('show');
    }
    $('.kitchenTitle').text($(this).find('span').text());
    $('.btn-to-secondStep').removeClass('active');
    closeAdditionalBlock();
    removeAllConfigurations();
    removeAllOptionsAfterChangeLocation();
    createNewBlocks(configuration);
    changeDepthConfig(configuration.depthTop, configuration.depthBottom);
    toggleImagesStick(sliderImages[i].nextElementSibling.firstElementChild);
    openNextAccordionItem($(this).parent().parent().parent().parent().next());
    [...$('.kitchen-fasad-wrap .custom-radio'), ...$('.kitchen-corps-color-wrap .custom-radio'), ...$('.second-step .custom-radio'), ...$('.third-step .custom-radio')].forEach(e => e.addEventListener('mouseup', changeOptions));
  });
});

sliderImages.forEach(function (e, i) {
  e.addEventListener('click', function () {
    toggleImagesStick(this.nextElementSibling.firstElementChild);
    generalTabConfiguration[i].click();
  });
});

locationModel.forEach(e => e.addEventListener('click', function () {

  $('.kitchen-param.active').each(function () { $(this).removeClass('active') });
  $('.kitchen-location .custom-radio').each(function () { $(this).removeClass('active') });
  $('.forCheckKitchenSection').prop('checked', false);
  if ($(this).hasClass('straight')) {
    $(this).addClass('active');
    $('.section-A').addClass('active');
    $('.straight-block').addClass('check');
    $('.straight-block .section-A-block').addClass('active');
    $('.corner-block').removeClass('check');
    $('.p-shaped-block').removeClass('check');
    $('.straight-block .section-A-block .forCheckKitchenSection').prop('checked', true);

  };
  if ($(this).hasClass('corner')) {
    $(this).addClass('active');
    $('.section-A').addClass('active');
    $('.section-B').addClass('active');
    $('.corner-block .section-A-block').addClass('active');
    $('.straight-block').removeClass('check');
    $('.corner-block').addClass('check');
    $('.p-shaped-block').removeClass('check');
    $('.corner-block .section-A-block .forCheckKitchenSection').prop('checked', true);
  };
  if ($(this).hasClass('p-shaped')) {
    $(this).addClass('active');
    $('.section-A').addClass('active');
    $('.section-B').addClass('active');
    $('.section-C').addClass('active');
    $('.p-shaped-block .section-A-block').addClass('active');
    $('.straight-block').removeClass('check');
    $('.corner-block').removeClass('check');
    $('.p-shaped-block').addClass('check');
    $('.p-shaped-block .section-A-block .forCheckKitchenSection').prop('checked', true);
  };



  removeAllOptionsAfterChangeLocation();
  openNextAccordionItem($(this).parent().parent().parent().next());
}));


$('.hideConfigImg').on('click', function () {
  checkConfigImg.classList.remove('show');
  // checkConfigImgMobile.classList.remove('show');
  slider.classList.remove('hide');
  $(this).removeClass('show');
});

$('.modules-headline').on('click', function () {
  if ($(this).hasClass('showModules')) {
    $(this).removeClass('showModules');
    $(this).find('.openAdd').removeClass('rotateAdd');
    $(this).next().slideUp('slow');
  } else {
    $(this).addClass('showModules');
    $(this).find('.openAdd').addClass('rotateAdd');
    $(this).next().slideDown('slow');
  };
});

function changeOptions() {
  if ($(this).parent().hasClass('kitchen-fasad')) {
    openNextAccordionItem($(this).parent().parent().parent().next());
  };
  if ($(this).parent().hasClass('kitchen-corps-color')) {
    $('.btn-to-secondStep').addClass('active');
  }
}

function changeDepthConfig(top, bottom) {
  $('#depthTop').val(`${top} см.`);
  $('#depthBottom').val(`${bottom} см.`);
};

function removeAllConfigurations() {
  removeConfigurations($('.kitchen-fasad-wrap'));
  removeConfigurations($('.kitchen-corps-color-wrap'));
  removeConfigurations($('.modules-body'));
  removeConfigurations($('.tableTop'));
  removeConfigurations($('.baseColor'));
  removeConfigurations($('.eavesColor'));
  removeConfigurations($('.third-step .accordion'))
};

function removeConfigurations(targets) {
  targets.each(function () {
    $(this).children().each(function () {
      $(this).remove();
    })
  })
};

function openNextAccordionItem(elem) {
  elem.addClass('open').next().slideDown("slow");
};

function toggleImagesStick(stick) {
  document.querySelectorAll('.img_tab.stick').forEach(e => e.classList.remove('active'));
  stick.classList.add('active');
};


// => CREATE NEW BLOCKS FUNCTION 

function createNewBlocks(newConfig) {
  createNewKitchenColorBlocks($('.kitchen-fasad-wrap'), 'kitchen-fasad', newConfig.kitchenFasad, 1);
  createNewKitchenColorBlocks($('.kitchen-corps-color-wrap'), 'kitchen-corps-color', newConfig.bodyColor, 2);
  createNewKitchenModelsBlocks($('.bottom-modules .modules-body'), newConfig.bottomModules);
  createNewKitchenModelsBlocks($('.top-modules .modules-body'), newConfig.topModules);
  createAddEquipFirstBlock($('.third-step .accordion'), newConfig.additionalEquipment);

  Array.from(document.getElementsByClassName('kitchen-modulesType')).forEach(el => el.addEventListener('click', openAdditionalModules));
  Array.from(document.getElementsByClassName('size-dropMenu-open')).forEach(el => el.addEventListener('click', openDropMenu));
  Array.from(document.querySelectorAll('.add-module-btn')).forEach(el => el.addEventListener('click', addModuleBlock));
  Array.from(document.querySelectorAll('modulesType-additionalBlock')).forEach(el => el.addEventListener('click', function (event) {
    event.stopPropagation();
  }))

};

function createNewKitchenColorBlocks(target, className, newConfig, labelNumber) {
  for (let i = 0; i < newConfig.length; i++) {
    target.append(
      `<div class="color-block ${className}">
        <label class="custom-radio">
          <input name="group${labelNumber}" type="radio">
          <div></div>
          <img class="img_color2" src="${newConfig[i].src}" alt="">
        </label>
        <p>${newConfig[i].name}</p>
      </div>`
    )
  };
};

function createNewKitchenModelsBlocks(target, newConfig) {
  for (let i = 0; i < newConfig.length; i++) {
    target.append(
      `<div class="modulesType col-12 col-md-6 col-lg-12" data-type=${newConfig[i].type != undefined ? newConfig[i].type : 'normal'}>
        <div class="kitchen-modulesType">
						<div class=" modulesType-img"><img src="${newConfig[i].src}" alt="">
						</div>
						<div class="modulesType-text">
							<p class="modulesType-headline">${newConfig[i].name}</p>
							<p class="modulesType-showExecution">
								<span class="modulesType-showExecution-quantity">(${newConfig[i].item.length})</span>Показать исполнения</p>
						</div>
						<div class="modulesType-open"><i class="fas fa-chevron-down openAdd"></i></div>
          </div>
          <div class="modulesType-additionalBlock">
            <div class="modulesType-additionalBlock-options"></div>
          </div>
      </div>`
    )
    createNewKitchenModelsBlocksAdditionalOptions(target.children().eq(i).children().find('.modulesType-additionalBlock-options'), newConfig[i].item)
  };
};

function createNewKitchenModelsBlocksAdditionalOptions(target, newConfig) {

  for (let i = 0; i < newConfig.length; i++) {

    let width = "<ul class='size-dropMenu-list'>";
    let height = "<ul class='size-dropMenu-list'>";
    let heightBottomModule;
    let arrow;
    let toggleClass;

    if (newConfig[i].height.length == undefined) {
      heightBottomModule = newConfig[i].height;
      arrow = '';
      toggleClass = '';
    } else {
      heightBottomModule = newConfig[i].height[0];
      arrow = '<i class="fas fa-caret-down"></i>';
      toggleClass = 'size-dropMenu-open';
    }

    for (let j = 0; j < newConfig[i].width.length; j++) {
      width += `<li>Ширина: ${newConfig[i].width[j]}.0 см.</li>`;

    };
    for (let j = 0; j < newConfig[i].height.length; j++) {
      height += `<li>Высота: ${newConfig[i].height[j]}.0 см.</li>`;
    };

    width += "</ul>";
    height += "</ul>";

    target.append(
      `<div class="kitchen-modulesType" data-price="${newConfig[i].price}">
       <div class="modulesType-img"><img
           src="${newConfig[i].src}" alt=""></div>
       <div class="modulesType-text">
         <p class="modulesType-add-headline">${newConfig[i].name}</p>
         <p class="modulesType-underAddHeadline">С одной дверцей вверху
         </p>
         <div class="size-dropMenu">
           <div class="${toggleClass}">
             <input class="size-dropMenu-inp" type="text" readonly
               value="Высота: ${heightBottomModule} см.">
             ${arrow}` + height + `</div>
         </div>
         <div class="size-dropMenu">
           <div class="size-dropMenu-open">
             <input class="size-dropMenu-inp" type="text" readonly
               value="Ширина: ${newConfig[i].width[0]} см.">
             <i class="fas fa-caret-down"></i>` + width + `</div>
         </div>
         <button class="add-module-btn">Добавить</button>
       </div>
     </div>`
    )
  };
};

// <= CREATE NEW BLOCKS FUNCTION 

// => FOR ADD MODULE BLOCKS FUNCTIONS 

function addModuleBlock() {
  let headline,
    description,
    width,
    height,
    price,
    priceTarget,
    depth,
    parentBlock,
    parentModuleBLock = $(this).parent().parent().parent().parent().parent(),
    targetBlock,
    prevTargetBlock,
    targetInput,
    prevTargetInput,
    secondTargetInput,
    regExp = new RegExp('custom-module'),
    customModuleBlockClassName;

  if ($(this).attr('class').search(regExp) != -1) {
    parentBlock = $(this).parent();
    headline = $(this).parent().find('.custom-module-headline').val();
    description = $(this).parent().find('.custom-module-description').val();
    width = `Ширина: ${$(this).parent().find('.custom-module-width').val()} см.`;
    height = `Высота: ${$(this).parent().find('.custom-module-height').val()} см.`;
    price = $(this).parent().attr('data-price');
    priceTarget = $(this).parent();
    customModuleBlockClassName = 'custom-module-block'
  } else {
    parentBlock = $(this).parent().parent().parent().parent().parent().parent().parent();
    headline = $(this).parent().find('.modulesType-add-headline').text();
    description = $(this).parent().find('.modulesType-underAddHeadline').text();
    width = $(this).parent().find('input').eq(1).val();
    height = $(this).parent().find('input').eq(0).val();
    price = $(this).parent().parent().attr('data-price');
    priceTarget = $(this).parent().parent();
    customModuleBlockClassName = '';
  }

  if (parentBlock.hasClass('top-modules')) {
    targetBlock = checkTargetForAddModuleBLock().find('.section-top');
    nextTargetBlock = targetBlock.parent().find('.section-bottom');
    depth = $('.kitchen-param.depth-E input').eq(0).val();
    targetInput = checkInputForChangeSizeConfig().find('.kitchen-param-left input').eq(0);
    secondTargetInput = targetInput.parent().parent().parent().next().find('.kitchen-param-left input').eq(0);
  } else if (parentBlock.hasClass('bottom-modules')) {
    targetBlock = checkTargetForAddModuleBLock().find('.section-bottom');
    prevTargetBlock = targetBlock.parent().find('.section-top');
    depth = $('.kitchen-param.depth-E input').eq(1).val();
    targetInput = checkInputForChangeSizeConfig().find('.kitchen-param-left input').eq(1);
    prevTargetInput = checkInputForChangeSizeConfig().find('.kitchen-param-left input').eq(0);
    secondTargetInput = targetInput.parent().parent().parent().next().find('.kitchen-param-left input').eq(1);
  };

  // For add corner module block
  if (targetBlock.children().length < 15) {
    if (parentModuleBLock.attr('data-type') == 'corner') {
      let nextTargetBlock;

      if (($('#sectionAS').prop('checked') == true || $('#sectionAC').prop('checked') == true || $('#sectionAP').prop('checked') == true) && targetBlock.find('.first-module-block').length < 1) {
        addCornerBlock(targetBlock, targetInput, secondTargetInput, headline, description, width, height, depth, `first-corner-block custom-corner${twoBlockCounter}`, price);
        // parentModuleBLock.find('.add-module-btn').prop('disabled', true);
        !$('.kitchen-location .custom-radio.straight').hasClass('active') ? parentModuleBLock.find('.add-module-btn').prop('disabled', true) : '';
      } else if (($('#sectionBS').prop('checked') == true || $('#sectionBC').prop('checked') == true || $('#sectionBP').prop('checked') == true) && targetBlock.find('.second-module-block').length < 1) {
        addCornerBlock(targetBlock, targetInput, secondTargetInput, headline, description, width, height, depth, `second-corner-block custom-corner${twoBlockCounter}`, price);
        // parentModuleBLock.find('.add-module-btn').prop('disabled', true);
        !$('.kitchen-location .custom-radio.straight').hasClass('active') ? parentModuleBLock.find('.add-module-btn').prop('disabled', true) : '';
      };

      // For dublickate corner module block
      if ($('.corner-block').hasClass('check') || $('.p-shaped-block').hasClass('check')) {
        if ($('#sectionAS').prop('checked') == true || $('#sectionAC').prop('checked') == true || $('#sectionAP').prop('checked') == true) {
          if (targetBlock.hasClass('section-top')) {
            nextTargetBlock = targetBlock.parent().next().find('.section-top');
            addCornerBlock(nextTargetBlock, targetInput, secondTargetInput, headline, description, width, height, depth, `first-corner-block custom-corner${twoBlockCounter}`, price);
            nextTargetBlock.prepend(nextTargetBlock.find('.first-corner-block').parent());
            nextTargetBlock.append(nextTargetBlock.find('.second-corner-block').parent());
          } else if (targetBlock.hasClass('section-bottom')) {
            nextTargetBlock = targetBlock.parent().next().find('.section-bottom');
            addCornerBlock(nextTargetBlock, targetInput, secondTargetInput, headline, description, width, height, depth, `first-corner-block custom-corner${twoBlockCounter}`, price);
            nextTargetBlock.prepend(nextTargetBlock.find('.first-corner-block').parent());
            nextTargetBlock.append(nextTargetBlock.find('.second-corner-block').parent());
          };
        } else if ($('#sectionBS').prop('checked') == true || $('#sectionBC').prop('checked') == true || $('#sectionBP').prop('checked') == true) {
          if (targetBlock.hasClass('section-top')) {
            nextTargetBlock = targetBlock.parent().next().find('.section-top');
            addCornerBlock(nextTargetBlock, targetInput, secondTargetInput, headline, description, width, height, depth, `second-corner-block custom-corner${twoBlockCounter}`, price);
          } else if (targetBlock.hasClass('section-bottom')) {
            nextTargetBlock = targetBlock.parent().next().find('.section-bottom');
            addCornerBlock(nextTargetBlock, targetInput, secondTargetInput, headline, description, width, height, depth, `second-corner-block custom-corner${twoBlockCounter}`, price);
          };
        };
      };
      changeInputSizeConfig(secondTargetInput, width);
    } else if (parentModuleBLock.attr('data-type') == 'twoBlocks' || parentBlock.hasClass('twoBlocks')) {
      // For paste twoBlocks module
      let className;
      parentBlock.hasClass('twoBlocks') ? className = `two-blocks-module two-blocks${twoBlockCounter} custom-module-block` : className = `two-blocks-module two-blocks${twoBlockCounter}`
      addTwoBlocksModule(targetBlock, targetInput, prevTargetInput, headline, description, width, height, depth, className, price);
      addTwoBlocksModule(prevTargetBlock, targetInput, prevTargetInput, headline, description, width, height, depth, className, price);
      changeInputSizeConfig(prevTargetInput, width);

    } else {
      // For change paste module method
      if ($('#sectionAS').prop('checked') == true || $('#sectionAC').prop('checked') == true || $('#sectionAP').prop('checked') == true) {
        addBlock(targetBlock, targetInput, headline, description, width, height, depth, price, customModuleBlockClassName);
        targetBlock.append(targetBlock.find('.first-corner-block').parent());
      } else if ($('#sectionBS').prop('checked') == true || $('#sectionBC').prop('checked') == true || $('#sectionBP').prop('checked') == true) {
        addBlock(targetBlock, targetInput, headline, description, width, height, depth, price, customModuleBlockClassName);
        targetBlock.prepend(targetBlock.find('.first-corner-block').parent());
        targetBlock.append(targetBlock.find('.second-corner-block').parent());
      } else {
        addBlock(targetBlock, targetInput, headline, description, width, height, depth, price, customModuleBlockClassName);
      }
    };
    changeInputSizeConfig(targetInput, width);
    addCommonPriceFromModule(priceTarget);
    closeCustomModulePopap();
    ++twoBlockCounter;
  };
  $('.btn-to-thirdStep').addClass('active');
};


function addBlock(target, targetInput, headline, description, width, height, depth, price, className) {
  target.append(createModuleBlock(headline, description, width, height, depth, price, className));
  $(target).find('.section-module button').last().on('click', function () {
    removeModuleBlock(this, targetInput);
  });
}
function addCornerBlock(target, targetInput, secondInput, headline, description, width, height, depth, className, price) {
  target.append(createCornerModuleBlock(headline, description, width, height, depth, className, price));
  $(target).find('.section-module button').last().on('click', function () {
    removeModuleBlock(this, targetInput, secondInput);
  });
}
function addTwoBlocksModule(target, targetInput, prevTargetInput, headline, description, width, height, depth, className, price) {
  target.append(createTwoBlocksModuleBlock(headline, description, width, height, depth, className, price));
  $(target).find('.section-module button').last().on('click', function () {
    removeTwoBlocksModule(this, targetInput, prevTargetInput);
  });
};

function checkTargetForAddModuleBLock() {
  let blocks = $('.kitchen-secondStep-visual .check .forCheckKitchenSection');
  let targetBlock;
  for (let i = 0; i < blocks.length; i++) {
    if ($(blocks).eq(i).prop('checked') == true) {
      targetBlock = $(blocks).eq(i).parent().parent().parent();
    };
  };
  return targetBlock
};

$('#sectionAS, #sectionAC, #sectionAP, #sectionBS, #sectionBC, #sectionBP').on('click', function () {
  if (checkTargetForAddModuleBLock().find('.second-corner-block').length == 0) {
    $('.add-module-btn').prop('disabled', false);
  } else if (checkTargetForAddModuleBLock().find('.first-corner-block').length == 0) {
    $('.add-module-btn').prop('disabled', false);
  };
});

function checkInputForChangeSizeConfig() {
  let target;
  if (checkTargetForAddModuleBLock().hasClass('section-A-block')) {
    target = $('.kitchen-param.section-A');
  } else if (checkTargetForAddModuleBLock().hasClass('section-B-block')) {
    target = $('.kitchen-param.section-B');
  } else if (checkTargetForAddModuleBLock().hasClass('section-C-block')) {
    target = $('.kitchen-param.section-C');
  };
  return target
};

function changeInputSizeConfig(target, width) {
  target.val(parseInt(target.val()) + parseInt(width.match(/\d+/)[0]) + ' см.');
};

function createModuleBlock(headline, description, width, height, depth, price, className) {
  return `<div class="col-2">
        <div class="section-module ${className} col-12" data-price="${price}">
        <p class="section-module-name">${headline}</p>
        <p class="section-module-description">${description}</p>
        <div class="section-module-sizes">
          <p class="section-module-sizes-height">${height}</p>
          <p class="section-module-sizes-width">${width}</p>
          <p class="section-module-sizes-depth">Глубина: ${depth}</p>
        </div>
        <button class="remove-module"><i class="fas fa-times"></i></button>
      </div>
    </div>`
};

function createCornerModuleBlock(headline, description, width, height, depth, className, price) {
  return `<div class="col-2">
      <div class="section-module corner-module-block ${className} col-12" data-price="${price}">
        <p class="section-module-name">${headline}</p>
        <p class="section-module-description">${description}</p>
        <div class="section-module-sizes">
          <p class="section-module-sizes-height">${height}</p>
          <p class="section-module-sizes-width">${width}</p>
          <p class="section-module-sizes-depth">Глубина: ${depth}</p>
        </div>
        <button class="remove-module"><i class="fas fa-times"></i></button>
      </div>
    </div>`
};
function createTwoBlocksModuleBlock(headline, description, width, height, depth, className, price) {
  return `<div class="col-2">
      <div class="section-module ${className} col-12" data-price="${price}">
        <p class="section-module-name">${headline}</p>
        <p class="section-module-description">${description}</p>
        <div class="section-module-sizes">
          <p class="section-module-sizes-height">${height}</p>
          <p class="section-module-sizes-width">${width}</p>
          <p class="section-module-sizes-depth">Глубина: ${depth}</p>
        </div>
        <button class="remove-module"><i class="fas fa-times"></i></button>
      </div>
    </div>`
};
// <= FOR ADD MODULE BLOCKS FUNCTIONS 

// => FOR ADD THIRD STEP BLOCKS 
function createAddEquipFirstBlock(target, newConfig) {

  for (let i = 0; i < newConfig.length; i++) {

    target.append(
      `<div class="accordion-item">
        ${newConfig[i].blockName}
        <div class="accordion-item-rightline"></div>
      </div>    
      <div class="data">
      <p class="text-field-for-edit">${newConfig[i].text}</p>
      <div class="color2 kitchen-color-onthirdStep-wrap">
      </div>
      </div>
      `
    )
    createAddEquipSecondBlock(target.children().last().find('.kitchen-color-onthirdStep-wrap'), newConfig[i].items, i);
  };
};

function createAddEquipSecondBlock(target, newConfig, counter) {
  if (newConfig != undefined) {
    for (let i = 0; i < newConfig.length; i++) {
      target.append(
        `<div class="color-block">
          <label class="custom-radio">
            <input name="group${counter}" type="radio">
            <div></div>
            <img class="img_color2" src="${newConfig[i].src}" alt="">
          </label>
          <p>${newConfig[i].name}</p>
        </div>`
      )
    };
  }
};
// <=  FOR ADD THIRD STEP BLOCKS 


// => FOR REMOVE MODULE BLOCKS 
function removeModuleBlock(target, input, secondInput) {
  let secondModuleClass;
  input.val(parseInt(input.val()) - parseInt($(target).parent().find('.section-module-sizes-width').text().match(/\d+/)[0]) + ' см.');
  // For unlock add module button
  if ($(target).parent().hasClass('corner-module-block')) {
    let parentForUnlockAddCornerButton = $('.modulesType-additionalBlock-options');
    let strForCompare = $(target).parent().find('.section-module-name').text();
    let regExp = new RegExp(strForCompare, 'g');
    for (let i = 0; i < parentForUnlockAddCornerButton.length; i++) {
      if (parentForUnlockAddCornerButton.eq(i).find('.modulesType-add-headline').text().search(regExp) != -1 && $('#sectionCP').prop('checked') != true) {
        parentForUnlockAddCornerButton.eq(i).find('.add-module-btn').prop('disabled', false);
      };
    };
    secondModuleClass = $(target).parent().attr('class').match(/custom-corner\d+/)[0];
    secondInput.val(parseInt(secondInput.val()) - parseInt($(target).parent().find('.section-module-sizes-width').text().match(/\d+/)[0]) + ' см.');
    $(`.${secondModuleClass}`).parent().remove();
  } else {
    $(target).parent().parent().remove();
  };

  if ($('.section-module').length == 0) {
    $('.btn-to-thirdStep').removeClass('active');
  }
  removeCommonPriceFromModule($(target).parent());
};

function removeTwoBlocksModule(target, input, prevInput) {
  input.val(parseInt(input.val()) - parseInt($(target).parent().find('.section-module-sizes-width').text().match(/\d+/)[0]) + ' см.');
  let secondModuleClass;
  if ($(target).parent().hasClass('two-blocks-module')) {
    secondModuleClass = $(target).parent().attr('class').match(/two-blocks\d+/)[0];
    prevInput.val(parseInt(prevInput.val()) - parseInt($(target).parent().find('.section-module-sizes-width').text().match(/\d+/)[0]) + ' см.');
    $(`.${secondModuleClass}`).parent().remove();
  } else {
    $(target).parent().parent().remove();
  }
  removeCommonPriceFromModule($(target).parent());

  if ($('.section-module').length == 0) {
    $('.btn-to-thirdStep').removeClass('active');
  };
};
// <= FOR REMOVE MODULE BLOCKS

// => FOR CHANGE COMMON PRICE 

function addCommonPriceFromModule(target) {
  let itemPrice = $(target).attr('data-price');
  let priceField = $('#priceField');
  priceField.text(`${parseInt(priceField.attr('data-common-price')) + parseInt(itemPrice)} грн.`);
  priceField.attr('data-common-price', priceField.text().replace(/\D+/, ''));
}
function removeCommonPriceFromModule(target) {
  let itemPrice = $(target).attr('data-price');
  let priceField = $('#priceField');
  priceField.text(`${parseInt(priceField.attr('data-common-price')) - parseInt(itemPrice)} грн.`);
  priceField.attr('data-common-price', priceField.text().replace(/\D+/, ''));
}

// <= FOR CHANGE COMMON PRICE 

function openAdditionalModules() {
  $(this).parent().find('.modulesType-additionalBlock').toggleClass('openAddBlock');
  $(this).find('.openAdd').toggleClass('rotateAdd');
};

function openDropMenu(event) {
  event = event || window.event;
  if (event.target.classList.contains('size-dropMenu-inp')) {
    this.getElementsByTagName('UL')[0].classList.toggle('openDropMenu');
  }
  if (event.target.tagName == 'LI') {
    this.getElementsByTagName('INPUT')[0].value = event.target.innerHTML;
    this.lastElementChild.classList.remove('openDropMenu');
  }
};

function closeAdditionalBlock() {
  $('.kitchen-corps-color').parent().removeClass('open');
  $('.kitchen-corps-color').slideUp('fast');
  $('.modules-headline').removeClass('showModules');
  $('.modules-body').slideUp('fast');
  $('.condition-modules-body').slideUp('fast');
  $('.openAdd').removeClass('rotateAdd');
}


$('.section-above-top label').on('click', function () {
  $('.sections').removeClass('active');
  $(this).parent().parent().parent().addClass('active');
  let buttonBlock = $('.modulesType');
  if ($(this).parent().find('input').attr('id') === 'sectionCP') {
    for (let i = 0; i < buttonBlock.length; i++) {
      if (buttonBlock.eq(i).attr('data-type') === 'corner') {
        $(buttonBlock.eq(i)).find('.add-module-btn').prop('disabled', true)
      }
    }
  }
})

$('.add-condition-module-btn').on('click', function () {
  $(this).next().addClass('show')
})
$('.close-create-module-popup').on('click', function () {
  $(this).parent().parent().removeClass('show')
})
$('.create-module-popup select').on('change', function () {
  $(this).parent().removeClass();
  $(this).parent().addClass($(this).val())

  if ($(this).val() == 'bottom-modules') {
    $('.custom-module-height').addClass('hide');
    $('.custom-module-height').prev().addClass('hide');
  } else {
    $('.custom-module-height').removeClass('hide');
    $('.custom-module-height').prev().removeClass('hide');
  };

  if ($(this).val() == 'twoBlocks') {
    $(this).parent().addClass('bottom-modules')
  };
});


function removeAllOptionsAfterChangeLocation() {
  $('.kitchen-param-left input').val(0);
  $('.section-top').children().remove();
  $('.section-bottom').children().remove();
  $('#priceField').text('0 грн.');
  $('#priceField').attr('data-common-price', 0);
  $('.add-module-btn').prop('disabled', false);
  $('.btn-to-thirdStep').removeClass('active');
};

function closeCustomModulePopap() {
  if ($('.create-module-popup').hasClass('show')) {
    $('.create-module-popup').removeClass('show')
    $('.create-module-popup div').find('input').val('');
  }
};

$('.individual-kitchen-btn').on('click', () => {
  $('.individual-kitchen-popup').addClass('show');
});

$('.close-individual-kitchen-popup').on('click', () => {
  $('.individual-kitchen-popup').removeClass('show')
});

$('#individualOrderBtn').on('click', (event) => {
  event.preventDefault();
  $('.individual-kitchen-popup').removeClass('show')
  $('.feedback-popup').addClass('show');
});

$('#callBack-form4 input[type="submit"]').click(function (event) {
  event.preventDefault();
  $('.feedback-popup').addClass('show');
  $('.mfp-close').click();
})

// => BUTTONS 

$('.btn-to-secondStep').click(function () {
  $('.first-step').css('display', 'none');
  $('.second-step').css('display', 'block');
  $('.kitchen-slider1').css('display', 'none');
  $('.kitchen-sections').css('display', 'block');
  $('.step1').removeClass('active');
  $('.step2').addClass('active');
  $('.hideConfigImg').removeClass('show');
  $('.checkConfigImage').removeClass('show');
  $('.straight').addClass('active');
  $('.straight input').prop('checked', true);
  $('.kitchen-param.section-A').addClass('active');
  $('.straight-block').addClass('check');
  $('#sectionAS').prop('checked', true);
  $('.btn-to-thirdStep').removeClass('active');
  $(window).scrollTop(0);
});
$('.btn-back-toFirst-step ').click(function () {
  $('.first-step').css('display', 'block');
  $('.second-step').css('display', 'none');
  $('.kitchen-slider1').css('display', 'block');
  $('.kitchen-sections').css('display', 'none');
  $('.step2').removeClass('active');
  $('.step1').addClass('active');
  $('.hideConfigImg').addClass('show');
  $('.checkConfigImage').addClass('show');
});
$('.btn-to-thirdStep').click(function () {
  $('.second-step').css('display', 'none');
  $('.third-step').css('display', 'block');
  $('.kitchen-sections').css('display', 'none');
  $('.step2').removeClass('active');
  $('.step3').addClass('active');
  $('.checkConfigImage').addClass('show');
  $('.kitchen-slider-desctop .kitchen-slider1').css('display', 'block');
  $(window).scrollTop(0);
});
$('.btn-back-toSecond-step').click(function () {
  $('.second-step').css('display', 'block');
  $('.third-step').css('display', 'none');
  $('.kitchen-sections').css('display', 'block');
  $('.step2').removeClass('active');
  $('.step3').addClass('active');
  $('.checkConfigImage').removeClass('show');
  $('.kitchen-slider-desctop .kitchen-slider1').css('display', 'none');
});
$('.btn-to-fourthStep').click(function () {
  $('.third-step').css('display', 'none');
  $('.fourth-step').css('display', 'block');
  $('.step3').removeClass('active');
  $('.step4').addClass('active');
  $('#configuratorTotalCost').text($('#priceField').attr('data-common-price') + ' грн.')
  $(window).scrollTop(0);
});
$('.btn-back-toThird-step').click(function () {
  $('.third-step').css('display', 'block');
  $('.fourth-step').css('display', 'none');
  $('.step4').removeClass('active');
  $('.step3').addClass('active');
});
// <= BUTTONS



document.getElementsByClassName('accept-terms')[0].addEventListener('click', function () {
  let btnToOrder = document.querySelector('.btn-to-order');
  let inp = document.getElementById('accept-term');
  if (!inp.checked) {
    btnToOrder.disabled = false;
    btnToOrder.classList.add('active');
  } else {
    btnToOrder.disabled = true;
    btnToOrder.classList.remove('active');
  }
});

$('.create-module-popup input[type="number"]').on('input', function () {
  if ($(this).val() > 100) {
    $(this).val(100)
  }
})

$('.individual-kitchen-popup .custom-module-height').on('input', function () {
  if ($(this).val() > 1000) {
    $(this).val(1000)
  }
});
$('.individual-kitchen-popup .custom-module-width').on('input', function () {
  if ($(this).val() > 1000) {
    $(this).val(1000)
  }
});
$('.individual-kitchen-popup .custom-module-depth').on('input', function () {
  if ($(this).val() > 100) {
    $(this).val(100)
  }
});