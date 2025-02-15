
@extends('blog.master')

@section('content')
    <x-blog.post.index :posts='$posts'>
        @slot('head')
            <H1>Listado de Publicaciones</H1>
        @endslot
        @slot('footer')
        <footer class="md:hidden bg-gray-900 text-white">
            <!-- Footer Top -->
            <div class="bg-gray-800 mx-auto px-11">
              <div class="container flex flex-col md:flex-row justify-between items-center mx-auto">
                <div class="logo w-full mx-5 my-5 justify-center text-center">
                  Logo
                </div>
                <div class="social w-full mx-5 my-5 flex justify-center text-center">
                  <a class="block flex items-center text-gray-300 hover:text-white mr-6 no-underline" href="#">
                                  <svg viewBox="0 0 24 24" class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M23.998 12c0-6.628-5.372-12-11.999-12C5.372 0 0 5.372 0 12c0 5.988 4.388 10.952 10.124 11.852v-8.384H7.078v-3.469h3.046V9.356c0-3.008 1.792-4.669 4.532-4.669 1.313 0 2.686.234 2.686.234v2.953H15.83c-1.49 0-1.955.925-1.955 1.874V12h3.328l-.532 3.469h-2.796v8.384c5.736-.9 10.124-5.864 10.124-11.853z" /></svg>
                              </a>
                              <a class="block flex items-center text-gray-300 hover:text-white mr-6 no-underline" href="#">
                                  <svg viewBox="0 0 24 24" class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M23.954 4.569a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.691 8.094 4.066 6.13 1.64 3.161a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.061a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.937 4.937 0 004.604 3.417 9.868 9.868 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63a9.936 9.936 0 002.46-2.548l-.047-.02z" /></svg>
                              </a>
                              <a class="block flex items-center text-gray-300 hover:text-white no-underline" href="#">
                                  <svg viewBox="0 0 24 24" class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" /></svg>
                              </a>
                </div>
                <div class="newsletter w-full mx-5 my-5 justify-center text-center">
                  Newsletter Form
                </div>
              </div>
            </div>

            <!-- Footer Middle -->
            <div class="container overflow-hidden flex flex-col lg:flex-row mx-auto p-4">
               <div class="w-full mx-auto p-2">
                 <!-- Accordions -->
                 <div class="tab w-full overflow-hidden">
                   <input class="absolute hidden opacity-0" id="tab-multi-one" type="checkbox" name="tabs" checked>
                   <div class="label relative">
                     <label class="block py-2 px-3 text-white uppercase font-medium tracking-wide cursor-pointer" for="tab-multi-one">
                       Product
                     </label>
                     <div class="w-full absolute inset-0 flex flex-end justify-end items-center pointer-events-none">
                       <svg class="icon w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                       </svg>
                     </div>
                   </div>
                   <div class="tab-content overflow-hidden leading-normal">
                      <ul class="w-full flex flex-col text-gray-700 list-none p-0 font-thin text-left">
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Features</a></li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Integrations</a></li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Pricing</a></li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">FAQ</a></li>
                      </ul>
                   </div>
                 </div>

                 <div class="tab w-full overflow-hidden">
                   <input class"absolute hidden opacity-0" id="tab-multi-two" type="checkbox" name="tabs">
                   <div class="label relative">
                     <label class="block py-2 px-3 text-white uppercase font-medium tracking-wide cursor-pointer" for="tab-multi-two">
                       Company
                     </label>
                     <div class="w-full absolute inset-0 flex flex-end justify-end items-center pointer-events-none">
                       <svg class="icon w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                       </svg>
                     </div>
                   </div>
                   <div class="tab-content overflow-hidden leading-normal">
                      <ul class="w-full flex flex-col text-gray-700 list-none p-0 font-thin text-left">
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Privacy Policy</a></li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Return Policy</a></li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Shipping</a></li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Terms of Service</a></li>
                      </ul>
                   </div>
                 </div>

                 <div class="tab w-full overflow-hidden">
                   <input class"absolute hidden opacity-0" id="tab-multi-three" type="checkbox" name="tabs">
                   <div class="label relative">
                     <label class="block py-2 px-3 text-white uppercase font-medium tracking-wide cursor-pointer" for="tab-multi-three">
                       Developers
                     </label>
                     <div class="w-full absolute inset-0 flex flex-end justify-end items-center pointer-events-none">
                       <svg class="icon w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                       </svg>
                     </div>
                   </div>
                   <div class="tab-content overflow-hidden leading-normal">
                      <ul class="w-full flex flex-col text-gray-700 list-none p-0 font-thin text-left">
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Developer API</a></li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Documentation</a></li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Guides</a></li>
                      </ul>
                   </div>
                 </div>

                 <div class="tab w-full overflow-hidden">
                   <input class"absolute hidden opacity-0" id="tab-multi-four" type="checkbox" name="tabs">
                   <div class="label relative">
                     <label class="block py-2 px-3 text-white uppercase font-medium tracking-wide cursor-pointer" for="tab-multi-four">
                       Explore
                     </label>
                     <div class="w-full absolute inset-0 flex flex-end justify-end items-center pointer-events-none">
                       <svg class="icon w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                       </svg>
                     </div>
                   </div>
                   <div class="tab-content overflow-hidden leading-normal">
                      <ul class="w-full flex flex-col text-gray-700 list-none p-0 font-thin text-left">
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Pricing</a></li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Product Series</a></li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Support</a></li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">FAQ</a></li>
                      </ul>
                   </div>
                 </div>
               </div>
            </div>

            <!-- Footer Bottom -->
            <div class="border-t border-gray-800 flex flex-col md:flex-row justify-center items-center p-6 mt-4 text-gray-600">
                <div>© 2020 Wishful Thinking Agency LLC.</div>
                <div>&nbsp;All rights reserved.<div>
            </div>
        </footer>

        <!-- FOOTER 2 DESKTOP -->
        <footer class="hidden md:block bg-gray-900 text-white">
            <!-- Footer Top -->
            <div class="bg-gray-800 mx-auto px-11">
              <div class="container flex flex-col md:flex-row justify-between items-center mx-auto">
                <div class="logo w-1/5 mx-5 my-5">
                  Logo
                </div>
                <div class="social w-1/5 mx-5 my-5 flex flex-start">
                  <a class="block flex items-center text-gray-300 hover:text-white mr-6 no-underline" href="#">
                                  <svg viewBox="0 0 24 24" class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M23.998 12c0-6.628-5.372-12-11.999-12C5.372 0 0 5.372 0 12c0 5.988 4.388 10.952 10.124 11.852v-8.384H7.078v-3.469h3.046V9.356c0-3.008 1.792-4.669 4.532-4.669 1.313 0 2.686.234 2.686.234v2.953H15.83c-1.49 0-1.955.925-1.955 1.874V12h3.328l-.532 3.469h-2.796v8.384c5.736-.9 10.124-5.864 10.124-11.853z" /></svg>
                              </a>
                              <a class="block flex items-center text-gray-300 hover:text-white mr-6 no-underline" href="#">
                                  <svg viewBox="0 0 24 24" class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M23.954 4.569a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.691 8.094 4.066 6.13 1.64 3.161a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.061a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.937 4.937 0 004.604 3.417 9.868 9.868 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63a9.936 9.936 0 002.46-2.548l-.047-.02z" /></svg>
                              </a>
                              <a class="block flex items-center text-gray-300 hover:text-white no-underline" href="#">
                                  <svg viewBox="0 0 24 24" class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" /></svg>
                              </a>
                </div>
                <div class="newsletter w-1/5 mx-5 my-5">
                  Newsletter Form
                </div>
              </div>
            </div>

            <!-- Footer Middle -->
            <div class="container overflow-hidden flex flex-col lg:flex-row justify-between mx-auto p-4">
                <div class="container block md:flex text-sm mt-6 lg:mt-0">
                    <ul class="text-gray-700 list-none p-0 font-thin flex flex-col text-left w-full">
                        <li class="inline-block py-2 px-3 text-white uppercase font-medium tracking-wide">Product</li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Features</a></li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Integrations</a></li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Pricing</a></li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">FAQ</a></li>
                    </ul>
                    <ul class="text-gray-700 list-none p-0 font-thin flex flex-col text-left w-full">
                        <li class="inline-block py-2 px-3 text-white uppercase font-medium tracking-wide">Company</li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Privacy</a>
                        </li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Terms of Service</a></li>
                    </ul>
                    <ul class="text-gray-700 list-none p-0 font-thin flex flex-col text-left w-full">
                        <li class="inline-block py-2 px-3 text-white uppercase font-medium tracking-wide">Developers</li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Developer API</a></li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Documentation</a></li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Tutorials</a></li>
                        </li>
                    </ul>
                    <ul class="text-gray-700 list-none p-0 font-thin flex flex-col text-left w-full">
                        <li class="inline-block py-2 px-3 text-white uppercase font-medium tracking-wide">Support</li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Contact Us</a></li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Support</a></li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Guides</a></li>
                        </li>
                    </ul>
                    <ul class="text-gray-700 list-none p-0 font-thin flex flex-col text-left w-full">
                        <li class="inline-block py-2 px-3 text-white uppercase font-medium tracking-wide">Programs</li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Affiliates</a></li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Rewards</a></li>
                        <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-gray-500 hover:text-white no-underline">Resellers</a></li>
                        </li>
                    </ul>
                </div>
            </div>

        </footer>
        @endslot
    </x-blog.post.index>
@endsection
