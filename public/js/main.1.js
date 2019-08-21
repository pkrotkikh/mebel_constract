$(window).on('load', function () {
  var $preloader = $('#preloader'),
    $svg_anm = $preloader.find('#preloader');
  $svg_anm.fadeOut();
  $preloader.delay(500).fadeOut('slow');
});

$(function () {
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

/////////////// FOR DELETE FIRS CONSTRUCTOR SLIDER ON DESCTOP

function deleteSlider() {
  let windowWidth = $(window).width();
  let firstSlider = $('.firstConstructorSlider');
  let appendItem = $('.first-step .data');
  if (windowWidth > 992) {
    firstSlider.detach();

  } else if (windowWidth < 992) {
    firstSlider.appendTo(appendItem[0])
  }
}

$(window).on('load resize', deleteSlider)


$(".add-more").click(function () {
  $('.btn-third-step').addClass('active');
});
$('.city').click(function () {
  $('.city_popup_box').addClass('active');
});

$('.close-city').click(function () {
  $('.city_popup_box').removeClass('active');
});
$('.city').click(function () {
  $('.city_popup_box').addClass('active');
});

// => CONFIGURATOR

$(".slider_box2").slick({
  prevArrow: '<i class="fas fa-chevron-left configurator-slider-arrow-left"></i>',
  nextArrow: '<i class="fas fa-chevron-right configurator-slider-arrow-right"></i>',
  infinite: false,
  slidesPerRow: 2,
  rows: 2,
  responsive: [
    {
      breakpoint: 600,
      settings: {
        slidesPerRow: 1,
        slidesToScroll: 1
      }
    },
  ]
});

$(window).on('scroll', function () {
  let price
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

$('#callBack-form4 input[type="submit"]').on('click', function (event) {
  event.preventDefault();
  $('.end-window').addClass('show-endWindow');
})

{
  let sliderImages;
  if ($(window).width() > 992) {
    sliderImages = Array.from(document.querySelectorAll('.secondConstructorSlider .size_box'));
  } else {
    sliderImages = Array.from(document.querySelectorAll('.firstConstructorSlider .size_box'));
  }
  let checkConfigImg = document.querySelector('.checkConfigImage');
  let checkConfigImgMobile = document.querySelector('.checkConfigImage-mobile');
  let configTabs = Array.from(document.querySelectorAll('.tabConf .custom-radio'));
  let doorsTabs = Array.from(document.querySelectorAll('.door .custom-radio'));
  let slider;

  sliderImages.forEach(function (e, i) {
    e.addEventListener('click', function () {
      slider = document.getElementsByClassName('slider_box2')[0];
      slider.classList.add('hide');
      if ($(window).width() > 992) {
        checkConfigImg.firstElementChild.setAttribute('src', e.firstElementChild.getAttribute('src'));
        checkConfigImg.classList.add('show');
      } else {
        checkConfigImgMobile.firstElementChild.setAttribute('src', e.firstElementChild.getAttribute('src'));
        checkConfigImgMobile.classList.add('show');
      }
      removeStick(document.querySelectorAll('.img_tab.stick'));
      $(this).find('.img_tab.stick').addClass('active');
      configTabs[i].click();
      $('.hideConfigImg').addClass('show');
    });
  });

  sliderImages.forEach(function (e) {
    e.addEventListener('mouseup', function () {
      $('.accordion .accordion-item').each(function () {
        if (!$(this).hasClass('first-config-tab') && !$(this).hasClass('second-config-tab') && !$(this).hasClass('third-config-tab')) {
          $(this).removeClass('open');
          $(this).next().slideUp("slow");
        };
      });
      $('.btn-toSecond-step').removeClass('active');
    });
  });

  configTabs.forEach(function (e, i) {
    e.addEventListener('click', function () {

      let titleBlock = document.getElementsByClassName('titel-config')[0];
      let title = this.getAttribute('data-name');
      titleBlock.innerHTML = title;

      if ($(window).width() > 992) {
        checkConfigImg.firstElementChild.setAttribute('src', this.getAttribute('data-src'));
        checkConfigImg.classList.add('show');
      } else {
        checkConfigImgMobile.firstElementChild.setAttribute('src', this.getAttribute('data-src'));
        checkConfigImgMobile.classList.add('show');
      }

      openNextAccordionItem($(this).parent().parent().parent().parent().next());
      sliderImages[i].click();

      $('.hideConfigImg').addClass('show');

      $('.door .custom-radio input').each(function () {
        $(this).prop('checked', false);
      });

      Array.from(document.getElementsByClassName('colorPrice')).forEach(e => e.innerHTML = '');

      $('.priceForSizeConfig span').each(function () {
        $(this).text('0 грн.')
      });

      changeDoorsConfigurations(this);
    });
  });

  configTabs.forEach(e => e.addEventListener('mouseup', function () {
    let priceValue = JSON.parse(this.getAttribute('data-info'));
    // changeTypePrice($('#priceField'), priceValue.price);

    checkConfigName = this.getAttribute('data-name');

    $('.accordion .accordion-item').each(function () {
      if (!$(this).hasClass('first-config-tab') && !$(this).hasClass('second-config-tab') && !$(this).hasClass('third-config-tab')) {
        $(this).removeClass('open');
        $(this).next().slideUp("slow");
      }
    });
    $('.btn-toSecond-step').removeClass('active');
  }));

  doorsTabs.forEach(e => e.addEventListener('click', function () {
    let dataInfoAttr = JSON.parse(e.getAttribute('data-info'));

    if ($(window).width() > 992) {
      checkConfigImg.firstElementChild.setAttribute('src', e.getAttribute('data-src'));
    } else {
      checkConfigImgMobile.firstElementChild.setAttribute('src', e.getAttribute('data-src'));
    }
    openNextAccordionItem($(this).parent().parent().parent().parent().next());
    removeSizeConfig();
    removeGeneralDoorsConfiguretions();
    checkSizeConfig(dataInfoAttr);
    removegeneralConfigurations();
    changeColorConfig(this);
    changeAdditionlaEquipment(dataInfoAttr);

    [...$('.second-step .custom-radio'), ...$('.third-step .custom-radio')].forEach(e => e.addEventListener('mouseup', changeCommonPrice));
    Array.from(document.querySelectorAll('.second-step .custom-radio')).forEach(e => e.addEventListener('click', showPriceForColorConfig));
    $('.btn-toSecond-step').addClass('active');
  }));

  $('.hideConfigImg').on('click', function () {
    checkConfigImg.classList.remove('show');
    checkConfigImgMobile.classList.remove('show');
    slider.classList.remove('hide');
    $(this).removeClass('show');
  });

  // => CUSTOM SIZES //
  $('.checkForEnterCusomSize').on('click', function () {
    if ($('.checkForEnterCusomSize input').prop('checked')) {
      parseInt($('.sizeTabs').css('height', 0 + 'px'));
      $('.customSizes').css('height', $('.customSizes')[0].scrollHeight)
    } else {
      $('.customSizes').css('height', 0 + 'px');
      $('.sizeTabs').css('height', $('.sizeTabs')[0].scrollHeight);
    }
  });
  $('.customSizes input').on('focus', function () {
    $(this).val('')
  })
  $('.customSizes input').on('blur', function () {
    if ($(this).val() == 0) {
      $(this).addClass('sizeError');
      $(".btn-toSecond-step").removeClass('active')
    } else {
      $(this).removeClass('sizeError');
      $(".btn-toSecond-step").addClass('active')
    }
  });
  // <= CUSTOM SIZES // 

  // => FOR CHANGE COMMON PRICE //

  // function changeTypePrice(target, priceValue) {
  //   target.text(`${priceValue} грн.`)
  //   target.attr('data-common-price', priceValue);
  // }

  function changeCommonPrice() {
    let itemPrice = parseInt($(this).attr('data-price'));
    let target = $('#priceField');

    if ($(window).width() > 992) {
      target = $('.priceForSizeConfig #priceField');
    } else {
      target = $('.priceForSizeConfig.mobile #priceField');
    }
    let commonPrice = parseInt(target.attr('data-common-price'));

    if ($(this).parent().parent().hasClass('color2')) {
      target.attr('data-color2-price', itemPrice);
      openNextAccordionItem($(this).parent().parent().parent().parent().next());
    }
    if ($(this).parent().parent().hasClass('color1')) {
      target.attr('data-color1-price', itemPrice);
      $('.btn-toThird-step').addClass('active')
    }
    if ($(this).parent().parent().hasClass('tab_fasad')) {
      target.attr('data-fasad-color-price', itemPrice);
      openNextAccordionItem($('.addEquipWrapp'));
    }
    if ($(this).parent().parent().hasClass('tab_addition') && $(this).parent().parent().parent().attr('id') == 'premiumAdditionalEquipment') {
      let commonPriceArray = [];
      let commonPrice;
      showPrice($(this).parent().parent().find('.price-value'), $(this).find('input')[0]);
      changeCommonPriceFromCheckBox($(this), $(this).find('input')[0], itemPrice);
      $('.tab_addition .custom-radio').each(function () {
        commonPriceArray.push(parseInt($(this).attr('data-price-for-calculate-common-price')));
      });
      commonPrice = commonPriceArray.reduce((sum, elem) => { return sum + elem }, 0);
      target.attr('data-addEquip-price', commonPrice);
    }
    target.text(`${commonPrice + parseInt(target.attr('data-color1-price')) + parseInt(target.attr('data-color2-price')) + parseInt(target.attr('data-fasad-color-price')) + parseInt(target.attr('data-addEquip-price'))} грн.`);
  }
  // <= FOR CHANGE COMMON PRICE //

  function showPrice(target, input) {
    !input.checked ? target.addClass('active') : target.removeClass('active');
  }
  function changeCommonPriceFromCheckBox(target, input, price) {
    if (!input.checked) {
      target.attr('data-price-for-calculate-common-price', price);
    } else {
      target.attr('data-price-for-calculate-common-price', 0);
    }
  }

  function removeSizeConfig() {
    $('.sizeConfig-list.width').find('option').each(function () {
      $(this).remove();
    });
    $('.sizeConfig-list.height').find('option').each(function () {
      $(this).remove();
    });
    $('.sizeConfig-list.depth').find('option').each(function () {
      $(this).remove();
    })
  }

  function checkSizeConfig(newConfig) {
    changeConfig($('.sizeConfig-list.width'), newConfig.width, 'option');
    changeConfig($('.sizeConfig-list.height'), newConfig.height, 'option');
    changeConfig($('.sizeConfig-list.depth'), newConfig.depth, 'option');
  }

  function changeConfig(target, newConfig, element) {
    for (let i = 0; i < newConfig.length; i++) {
      target.append(`<${element}>${newConfig[i]}</${element}>`)
    }
  }
  // function checkConfig() {
  //   let generalConf = document.getElementsByName('generalConf')
  //   let checkedElement;
  //   for (let i = 0; i < configTabs.length; i++) {
  //     if (generalConf[i].checked) {
  //       checkedElement = generalConf[i];
  //     }
  //   }
  //   return checkedElement.parentNode
  // }

  function changeAdditionlaEquipment(newConfig) {
    createNewAdditionalEquipmentsConfigBLock($('#standartAdditionalEquipment'), newConfig.additionalEquipment);
    createNewAdditionalEquipmentsConfigBLock($('#premiumAdditionalEquipment'), newConfig.additionalEquipment);
  }

  function changeDoorsConfigurations(target) {
    let dataInfoAttr = JSON.parse(target.getAttribute('data-info'));
    let twoDorsBlock = document.getElementById('twoDoors');
    let threeDorsBlock = document.getElementById('threeDoors');

    twoDorsBlock.setAttribute('data-info', JSON.stringify(dataInfoAttr.twoDoors));
    threeDorsBlock.setAttribute('data-info', JSON.stringify(dataInfoAttr.threeDoors));

  }

  function changeColorConfig(target) {

    let dataInfoAttr = JSON.parse(target.getAttribute('data-info'));

    createNewColorConfigBLock($('#standartBodyColor'), dataInfoAttr.standartBodyColor, 5);
    createNewColorConfigBLock($('#premiumBodyColor'), dataInfoAttr.premiumBodyColor, 5);
    createNewColorConfigBLock($('#luxBodyColor'), dataInfoAttr.luxBodyColor, 5);
    createNewColorConfigBLock($('#standartProfileColor'), dataInfoAttr.standartProfileColor, 4);
    createNewColorConfigBLock($('#premiumProfileColor'), dataInfoAttr.premiumProfileColor, 4);
    createNewColorConfigBLock($('#luxProfileColor'), dataInfoAttr.luxProfileColor, 4);
    createNewFasadConfigBLock($('#standartFasad'), dataInfoAttr.standartFasad, 6);
    createNewFasadConfigBLock($('#premiumFasad'), dataInfoAttr.premiumFasad, 6);
  }

  function createNewColorConfigBLock(target, newConfig, labelNumber) {
    for (let i = 0; i < newConfig.length; i++) {
      target.append(
        `<div class="color col-4 col-sm-2 col-lg-4">
          <label class="custom-radio" data-price="${newConfig[i].price}">
            <input name="group${labelNumber}" type="radio" data-cost="${newConfig[i].price}">
            <div></div>
            <img src="${newConfig[i].image}" alt="">
          </label>
          <p class="name-additions">${newConfig[i].name}</p>
        </div>`
      )
    }
  }
  function createNewFasadConfigBLock(target, newConfig, labelNumber) {
    for (let i = 0; i < newConfig.length; i++) {
      target.append(
        `<div class="col-6 col-md-12 col-lg-12 tab_fasad">
          <span class="checkbox_size">
          <label class="custom-radio" data-price="${newConfig[i].price}"><input name="group${labelNumber}" type="radio"
              data-cost="${newConfig[i].price}">
              <div></div><span>${newConfig[i].name}</span>
          </label>
          </span>
      </div>`
      )
    }
  }

  function createNewAdditionalEquipmentsConfigBLock(target, newConfig, labelNumber) {
    for (let i = 0; i < newConfig.length; i++) {
      target.append(
        `<div class="tab_addition col-12">
          <span class="checkbox_size add-more">
          <label class="custom-radio" data-price="${newConfig[i].price}" data-price-for-calculate-common-price="0"><input name="group7" type="checkbox" data-cost="${newConfig[i].price}">
            <div></div><span>${newConfig[i].name}</span>
          </label>
          </span>
          <span class="price-value">${newConfig[i].price} грн.</span>
      </div>`
      )
    }
  }

  function removeStick(elem) {
    elem.forEach(e => e.classList.remove('active'))
  }

  function openNextAccordionItem(elem) {
    elem.addClass('open').next().slideDown("slow");
  }

  function showPriceForColorConfig() {
    let price = this.getAttribute('data-price')
    let parent = this.parentNode.parentNode.parentNode.parentNode;
    let parentForField = this.parentNode.parentNode.parentNode;
    let priceField = parentForField.getElementsByTagName('h3')[0].lastChild;

    Array.from(parent.getElementsByClassName('colorPrice')).forEach(e => e.innerHTML = '');
    priceField.innerHTML = `+ ${price} грн.`;
  }

  // => FOR UNLOCK ORDER BUTTON //
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
  // <= FOR UNLOCK ORDER BUTTON //

  function removegeneralConfigurations() {
    removeAllConfigurations($('.color2'));
    removeAllConfigurations($('.color1'));
    removeAllConfigurations($('.fasads'));

    $('#priceField').each(function () {
      $.each(this.attributes, function () {
        if (this.name !== 'data-common-price' && this.name != 'id') {
          this.value = 0
        }
      });
    });
  };

  function removeGeneralDoorsConfiguretions(e) {
    removeAllConfigurations($('.addEquip'))
  };

  function removeAllConfigurations(targets) {
    targets.each(function () {
      $(this).children().each(function () {
        $(this).remove();
      })
    })
  };

  // BUTTONS //

  $(".btn-toSecond-step").click(function () {
    $('.btn-toSecond-step').removeClass('active');
    $('.btn-back-toFirst-step').addClass('active');
    $('.first-step').css('display', 'none');
    $('.second-step').css('display', 'block');
    $('.step2').addClass('active');
    $('.step1').removeClass('active');
    $('.hideConfigImg').removeClass('show');
  });

  $(".btn-back-toFirst-step").click(function () {
    $('.btn-back-toFirst-step').removeClass('active');
    $('.btn-toSecond-step').addClass('active');
    $('.first-step').css('display', 'block');
    $('.second-step').css('display', 'none');
    $('.step1').addClass('active');
    $('.step2').removeClass('active');
    $('.hideConfigImg').addClass('show');
  });

  $(".btn-toThird-step").click(function () {
    $('.btn-toThird-step').removeClass('active');
    $('.btn-back-toSecond-step').addClass('active');
    $('.btn-toFourth-step').removeClass('active');
    $('.second-step').css('display', 'none');
    $('.third-step').css('display', 'block');
    $('.step3').addClass('active');
    $('.step2').removeClass('active');

    Array.from(document.getElementsByClassName('tab_fasad')).forEach(e => e.addEventListener('click', function () {
      $('.btn-toFourth-step').addClass('active');
    }));
  });

  $('.btn-back-toSecond-step').click(function () {
    $('.btn-toThird-step').addClass('active');
    $('.second-step').css('display', 'block');
    $('.third-step').css('display', 'none');
    $('.step2').addClass('active');
    $('.step3').removeClass('active');
  });
  $(".btn-toFourth-step").click(function () {
    $('.btn-toThird-step').removeClass('active');
    $('.btn-back-toThird-step').addClass('active');
    $('.third-step').css('display', 'none');
    $('.fourth-step').css('display', 'block');
    $('.step4').addClass('active');
    $('.step3').removeClass('active');
    $('.priceForSizeConfig').addClass('hide');
    $('#configuratorTotalCost').text($('#priceField').text());
    $('#configuratorTotalCost').attr('data-total-cost', parseInt(($('#priceField').text())));
    $('.priceForSizeConfig.mobile').removeClass('show');
  });

  $('.btn-back-toThird-step').click(function () {
    $('.third-step').css('display', 'block');
    $('.fourth-step').css('display', 'none');
    $('.step3').addClass('active');
    $('.step4').removeClass('active');
    $('.priceForSizeConfig').removeClass('hide');
    $('.priceForSizeConfig.mobile').addClass('show');
    $(".btn-toFourth-step").addClass('active');
  });

  $(function () {
    $('.btn_massage').click(function () {
      $('.massage, .massage_form, .btn_massage').toggleClass('active');
    });
  });
  $(function () {
    $('.btn_massage_mobil').click(function () {
      $('.massage, .massage_form, .btn_massage, .btn_massage_mobil').toggleClass('active');
    });
  });
}
