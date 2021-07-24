# Install laravel lastest version
=> laravel new laravue

# Install Vue & Dependencies
=> npm install -D vue@next @vue/compiler-sfc vue-loader@next

=> npm install --save vue@next && npm install --save-dev vue-loader@next

# Prepare Mix for Vue
=> mix.js('resources/js/app.js', 'public/js') .vue() .postCss('resources/css/app.css', 'public/css', [ // ]);

# Install other dependencies
=> npm install
