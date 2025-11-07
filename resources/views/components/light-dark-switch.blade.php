<button
    x-data="{
        darkMode: $persist(false).as('dark_mode'),
        toggleDarkMode(){
            document.documentElement.classList.toggle('dark');
            if(document.documentElement.classList.contains('dark')){
                this.darkMode = true;

            } else {
                this.darkMode = false;

            }
        }
    }"
    @click="toggleDarkMode()"
    x-init="
        if(document.documentElement.classList.contains('dark')){ darkMode=true; }
    "
    class="w-full h-full flex items-center justify-center hover:bg-gray-100 text-gray-500 hover:text-gray-600 dark:hover:bg-gray-800 dark:text-gray-300 dark:hover:text-gray-100"
>
    <i class="fas fa-sun dark:hidden"></i>
    <i class="fas fa-moon hidden dark:inline"></i>

</button>
