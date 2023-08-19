
<div class="w-full lg:p-10 p-4 flex flex-col gap-6">

    <div class="w-full">

        <h1 class="text-5xl text-white tracking-wide font-semibold border-b pb-6">Home <span
                class="text-2xl text-gray-400">/ Processes</span></h1>

    </div>

    <div class="grid md:grid-cols-2 2xl:grid-cols-4 gap-10" x-data="{ show1: false, show2: false, show3: false, show4: false, show5: false, show6: false, show7: false, show8: false, show9: false, show10: false, show11: false, show12: false }">

        <div class="h-fit grid gap-10">

            <div class="bg-sb rounded-xl p-4 border border-br h-fit">

                <h2 class="text-white text-xl font-semibold cursor-pointer" @click="show1 = ! show1"><i class="fa-solid fa-user text-accent mr-2 text-lg"></i> Customer Service Process <i class="fa-solid fa-angle-up text-accent float-right text-lg" x-show="show1"></i> <i class="fa-solid fa-angle-down text-accent float-right text-lg" x-cloak x-show="!show1"></i></h2>

                <div x-cloak x-show="show1">

                    <div class=" mt-10 flex flex-col rounded-lg">

                        <div>
                            <h3 class="text-white font-semibold">Step 1: Customer Inquiry</h3>
                            <p class="text-gray-400 mt-2">
                                - The process begins when a customer makes an inquiry, either through your website, email, or
                                phone. <br>
                                - The inquiry is logged into the system and assigned a unique ticket or reference number.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 2: Ticket Assignment</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer inquiry is automatically or manually assigned to a customer service
                                representative based on availability or expertise.<br>
                                - The assigned representative becomes responsible for handling the inquiry
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 3: Ticket Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative updates the ticket with relevant information and any
                                actions taken.<br>
                                - The ticket's status is regularly updated to reflect its progress through the customer service
                                process.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 4: Customer Interaction</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative communicates with the customer to gather additional
                                information, provide assistance, or resolve any issues.<br>
                                - All interactions with the customer, including call logs, emails, or chat transcripts, are
                                recorded in the system and linked to the ticket.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 5: Issue Resolution</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative works to resolve the customer's inquiry or problem
                                promptly and effectively. <br>
                                - If necessary, the representative may collaborate with other departments or escalate the ticket
                                to a higher-level support team.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 6: Ticket Closure</h3>
                            <p class="text-gray-400 mt-2">
                                - Once the customer's inquiry is resolved or the issue is addressed to the customer's
                                satisfaction, the ticket is marked as "resolved" or "closed."<br>
                                - The customer is informed of the resolution and asked for feedback on their experience with
                                customer service.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 7: Customer Feedback</h3>
                            <p class="text-gray-400 mt-2">
                                - Customer feedback is collected through surveys, ratings, or comments related to their
                                interaction with customer service.<br>
                                - The feedback is recorded in the system for analysis and improvement purposes.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 8: Performance Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - Key performance metrics for the customer service process are monitored, such as response time,
                                ticket resolution time, customer satisfaction scores, and ticket volume.<br>
                                - Performance trends and insights are displayed on the sales dashboard for easy monitoring and
                                analysis.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 9: Continuous Improvement</h3>
                            <p class="text-gray-400 mt-2">
                                - Regularly review the customer service process and metrics to identify areas for
                                improvement.<br>
                                - Use the insights gathered from customer feedback and performance data to make adjustments and
                                enhance the overall customer service experience.
                            </p>
                        </div>
        
                    </div>
                    
                </div>

            </div>

            <div class="bg-sb rounded-xl p-4 border border-br h-fit">

                <h2 class="text-white text-xl font-semibold cursor-pointer" @click="show2 = ! show2"><i class="fa-solid fa-user text-accent mr-2 text-lg"></i> Customer Service Process <i class="fa-solid fa-angle-up text-accent float-right text-lg" x-show="show2"></i> <i class="fa-solid fa-angle-down text-accent float-right text-lg" x-cloak x-show="!show2"></i></h2>

                <div x-cloak x-show="show2">

                    <div class=" mt-10 flex flex-col rounded-lg">

                        <div>
                            <h3 class="text-white font-semibold">Step 1: Customer Inquiry</h3>
                            <p class="text-gray-400 mt-2">
                                - The process begins when a customer makes an inquiry, either through your website, email, or
                                phone. <br>
                                - The inquiry is logged into the system and assigned a unique ticket or reference number.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 2: Ticket Assignment</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer inquiry is automatically or manually assigned to a customer service
                                representative based on availability or expertise.<br>
                                - The assigned representative becomes responsible for handling the inquiry
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 3: Ticket Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative updates the ticket with relevant information and any
                                actions taken.<br>
                                - The ticket's status is regularly updated to reflect its progress through the customer service
                                process.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 4: Customer Interaction</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative communicates with the customer to gather additional
                                information, provide assistance, or resolve any issues.<br>
                                - All interactions with the customer, including call logs, emails, or chat transcripts, are
                                recorded in the system and linked to the ticket.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 5: Issue Resolution</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative works to resolve the customer's inquiry or problem
                                promptly and effectively. <br>
                                - If necessary, the representative may collaborate with other departments or escalate the ticket
                                to a higher-level support team.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 6: Ticket Closure</h3>
                            <p class="text-gray-400 mt-2">
                                - Once the customer's inquiry is resolved or the issue is addressed to the customer's
                                satisfaction, the ticket is marked as "resolved" or "closed."<br>
                                - The customer is informed of the resolution and asked for feedback on their experience with
                                customer service.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 7: Customer Feedback</h3>
                            <p class="text-gray-400 mt-2">
                                - Customer feedback is collected through surveys, ratings, or comments related to their
                                interaction with customer service.<br>
                                - The feedback is recorded in the system for analysis and improvement purposes.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 8: Performance Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - Key performance metrics for the customer service process are monitored, such as response time,
                                ticket resolution time, customer satisfaction scores, and ticket volume.<br>
                                - Performance trends and insights are displayed on the sales dashboard for easy monitoring and
                                analysis.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 9: Continuous Improvement</h3>
                            <p class="text-gray-400 mt-2">
                                - Regularly review the customer service process and metrics to identify areas for
                                improvement.<br>
                                - Use the insights gathered from customer feedback and performance data to make adjustments and
                                enhance the overall customer service experience.
                            </p>
                        </div>
        
                    </div>
                    
                </div>

            </div>

            <div class="bg-sb rounded-xl p-4 border border-br h-fit">

                <h2 class="text-white text-xl font-semibold cursor-pointer" @click="show3 = ! show3"><i class="fa-solid fa-user text-accent mr-2 text-lg"></i> Customer Service Process <i class="fa-solid fa-angle-up text-accent float-right text-lg" x-show="show3"></i> <i class="fa-solid fa-angle-down text-accent float-right text-lg" x-cloak x-show="!show3"></i></h2>

                <div x-cloak x-show="show3">

                    <div class=" mt-10 flex flex-col rounded-lg">

                        <div>
                            <h3 class="text-white font-semibold">Step 1: Customer Inquiry</h3>
                            <p class="text-gray-400 mt-2">
                                - The process begins when a customer makes an inquiry, either through your website, email, or
                                phone. <br>
                                - The inquiry is logged into the system and assigned a unique ticket or reference number.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 2: Ticket Assignment</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer inquiry is automatically or manually assigned to a customer service
                                representative based on availability or expertise.<br>
                                - The assigned representative becomes responsible for handling the inquiry
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 3: Ticket Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative updates the ticket with relevant information and any
                                actions taken.<br>
                                - The ticket's status is regularly updated to reflect its progress through the customer service
                                process.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 4: Customer Interaction</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative communicates with the customer to gather additional
                                information, provide assistance, or resolve any issues.<br>
                                - All interactions with the customer, including call logs, emails, or chat transcripts, are
                                recorded in the system and linked to the ticket.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 5: Issue Resolution</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative works to resolve the customer's inquiry or problem
                                promptly and effectively. <br>
                                - If necessary, the representative may collaborate with other departments or escalate the ticket
                                to a higher-level support team.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 6: Ticket Closure</h3>
                            <p class="text-gray-400 mt-2">
                                - Once the customer's inquiry is resolved or the issue is addressed to the customer's
                                satisfaction, the ticket is marked as "resolved" or "closed."<br>
                                - The customer is informed of the resolution and asked for feedback on their experience with
                                customer service.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 7: Customer Feedback</h3>
                            <p class="text-gray-400 mt-2">
                                - Customer feedback is collected through surveys, ratings, or comments related to their
                                interaction with customer service.<br>
                                - The feedback is recorded in the system for analysis and improvement purposes.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 8: Performance Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - Key performance metrics for the customer service process are monitored, such as response time,
                                ticket resolution time, customer satisfaction scores, and ticket volume.<br>
                                - Performance trends and insights are displayed on the sales dashboard for easy monitoring and
                                analysis.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 9: Continuous Improvement</h3>
                            <p class="text-gray-400 mt-2">
                                - Regularly review the customer service process and metrics to identify areas for
                                improvement.<br>
                                - Use the insights gathered from customer feedback and performance data to make adjustments and
                                enhance the overall customer service experience.
                            </p>
                        </div>
        
                    </div>
                    
                </div>

            </div>

        </div>

        <div class="h-fit grid gap-10">

            <div class="bg-sb rounded-xl p-4 border border-br h-fit">

                <h2 class="text-white text-xl font-semibold cursor-pointer" @click="show4 = ! show4"><i class="fa-solid fa-user text-accent mr-2 text-lg"></i> Customer Service Process <i class="fa-solid fa-angle-up text-accent float-right text-lg" x-show="show4"></i> <i class="fa-solid fa-angle-down text-accent float-right text-lg" x-cloak x-show="!show4"></i></h2>

                <div x-cloak x-show="show4">

                    <div class=" mt-10 flex flex-col rounded-lg">

                        <div>
                            <h3 class="text-white font-semibold">Step 1: Customer Inquiry</h3>
                            <p class="text-gray-400 mt-2">
                                - The process begins when a customer makes an inquiry, either through your website, email, or
                                phone. <br>
                                - The inquiry is logged into the system and assigned a unique ticket or reference number.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 2: Ticket Assignment</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer inquiry is automatically or manually assigned to a customer service
                                representative based on availability or expertise.<br>
                                - The assigned representative becomes responsible for handling the inquiry
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 3: Ticket Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative updates the ticket with relevant information and any
                                actions taken.<br>
                                - The ticket's status is regularly updated to reflect its progress through the customer service
                                process.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 4: Customer Interaction</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative communicates with the customer to gather additional
                                information, provide assistance, or resolve any issues.<br>
                                - All interactions with the customer, including call logs, emails, or chat transcripts, are
                                recorded in the system and linked to the ticket.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 5: Issue Resolution</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative works to resolve the customer's inquiry or problem
                                promptly and effectively. <br>
                                - If necessary, the representative may collaborate with other departments or escalate the ticket
                                to a higher-level support team.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 6: Ticket Closure</h3>
                            <p class="text-gray-400 mt-2">
                                - Once the customer's inquiry is resolved or the issue is addressed to the customer's
                                satisfaction, the ticket is marked as "resolved" or "closed."<br>
                                - The customer is informed of the resolution and asked for feedback on their experience with
                                customer service.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 7: Customer Feedback</h3>
                            <p class="text-gray-400 mt-2">
                                - Customer feedback is collected through surveys, ratings, or comments related to their
                                interaction with customer service.<br>
                                - The feedback is recorded in the system for analysis and improvement purposes.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 8: Performance Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - Key performance metrics for the customer service process are monitored, such as response time,
                                ticket resolution time, customer satisfaction scores, and ticket volume.<br>
                                - Performance trends and insights are displayed on the sales dashboard for easy monitoring and
                                analysis.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 9: Continuous Improvement</h3>
                            <p class="text-gray-400 mt-2">
                                - Regularly review the customer service process and metrics to identify areas for
                                improvement.<br>
                                - Use the insights gathered from customer feedback and performance data to make adjustments and
                                enhance the overall customer service experience.
                            </p>
                        </div>
        
                    </div>
                    
                </div>

            </div>

            <div class="bg-sb rounded-xl p-4 border border-br h-fit">

                <h2 class="text-white text-xl font-semibold cursor-pointer" @click="show5 = ! show5"><i class="fa-solid fa-user text-accent mr-2 text-lg"></i> Customer Service Process <i class="fa-solid fa-angle-up text-accent float-right text-lg" x-show="show5"></i> <i class="fa-solid fa-angle-down text-accent float-right text-lg" x-cloak x-show="!show5"></i></h2>

                <div x-cloak x-show="show5">

                    <div class=" mt-10 flex flex-col rounded-lg">

                        <div>
                            <h3 class="text-white font-semibold">Step 1: Customer Inquiry</h3>
                            <p class="text-gray-400 mt-2">
                                - The process begins when a customer makes an inquiry, either through your website, email, or
                                phone. <br>
                                - The inquiry is logged into the system and assigned a unique ticket or reference number.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 2: Ticket Assignment</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer inquiry is automatically or manually assigned to a customer service
                                representative based on availability or expertise.<br>
                                - The assigned representative becomes responsible for handling the inquiry
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 3: Ticket Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative updates the ticket with relevant information and any
                                actions taken.<br>
                                - The ticket's status is regularly updated to reflect its progress through the customer service
                                process.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 4: Customer Interaction</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative communicates with the customer to gather additional
                                information, provide assistance, or resolve any issues.<br>
                                - All interactions with the customer, including call logs, emails, or chat transcripts, are
                                recorded in the system and linked to the ticket.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 5: Issue Resolution</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative works to resolve the customer's inquiry or problem
                                promptly and effectively. <br>
                                - If necessary, the representative may collaborate with other departments or escalate the ticket
                                to a higher-level support team.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 6: Ticket Closure</h3>
                            <p class="text-gray-400 mt-2">
                                - Once the customer's inquiry is resolved or the issue is addressed to the customer's
                                satisfaction, the ticket is marked as "resolved" or "closed."<br>
                                - The customer is informed of the resolution and asked for feedback on their experience with
                                customer service.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 7: Customer Feedback</h3>
                            <p class="text-gray-400 mt-2">
                                - Customer feedback is collected through surveys, ratings, or comments related to their
                                interaction with customer service.<br>
                                - The feedback is recorded in the system for analysis and improvement purposes.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 8: Performance Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - Key performance metrics for the customer service process are monitored, such as response time,
                                ticket resolution time, customer satisfaction scores, and ticket volume.<br>
                                - Performance trends and insights are displayed on the sales dashboard for easy monitoring and
                                analysis.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 9: Continuous Improvement</h3>
                            <p class="text-gray-400 mt-2">
                                - Regularly review the customer service process and metrics to identify areas for
                                improvement.<br>
                                - Use the insights gathered from customer feedback and performance data to make adjustments and
                                enhance the overall customer service experience.
                            </p>
                        </div>
        
                    </div>
                    
                </div>

            </div>

            <div class="bg-sb rounded-xl p-4 border border-br h-fit">

                <h2 class="text-white text-xl font-semibold cursor-pointer" @click="show6 = ! show6"><i class="fa-solid fa-user text-accent mr-2 text-lg"></i> Customer Service Process <i class="fa-solid fa-angle-up text-accent float-right text-lg" x-show="show6"></i> <i class="fa-solid fa-angle-down text-accent float-right text-lg" x-cloak x-show="!show6"></i></h2>

                <div x-cloak x-show="show6">

                    <div class=" mt-10 flex flex-col rounded-lg">

                        <div>
                            <h3 class="text-white font-semibold">Step 1: Customer Inquiry</h3>
                            <p class="text-gray-400 mt-2">
                                - The process begins when a customer makes an inquiry, either through your website, email, or
                                phone. <br>
                                - The inquiry is logged into the system and assigned a unique ticket or reference number.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 2: Ticket Assignment</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer inquiry is automatically or manually assigned to a customer service
                                representative based on availability or expertise.<br>
                                - The assigned representative becomes responsible for handling the inquiry
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 3: Ticket Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative updates the ticket with relevant information and any
                                actions taken.<br>
                                - The ticket's status is regularly updated to reflect its progress through the customer service
                                process.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 4: Customer Interaction</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative communicates with the customer to gather additional
                                information, provide assistance, or resolve any issues.<br>
                                - All interactions with the customer, including call logs, emails, or chat transcripts, are
                                recorded in the system and linked to the ticket.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 5: Issue Resolution</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative works to resolve the customer's inquiry or problem
                                promptly and effectively. <br>
                                - If necessary, the representative may collaborate with other departments or escalate the ticket
                                to a higher-level support team.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 6: Ticket Closure</h3>
                            <p class="text-gray-400 mt-2">
                                - Once the customer's inquiry is resolved or the issue is addressed to the customer's
                                satisfaction, the ticket is marked as "resolved" or "closed."<br>
                                - The customer is informed of the resolution and asked for feedback on their experience with
                                customer service.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 7: Customer Feedback</h3>
                            <p class="text-gray-400 mt-2">
                                - Customer feedback is collected through surveys, ratings, or comments related to their
                                interaction with customer service.<br>
                                - The feedback is recorded in the system for analysis and improvement purposes.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 8: Performance Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - Key performance metrics for the customer service process are monitored, such as response time,
                                ticket resolution time, customer satisfaction scores, and ticket volume.<br>
                                - Performance trends and insights are displayed on the sales dashboard for easy monitoring and
                                analysis.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 9: Continuous Improvement</h3>
                            <p class="text-gray-400 mt-2">
                                - Regularly review the customer service process and metrics to identify areas for
                                improvement.<br>
                                - Use the insights gathered from customer feedback and performance data to make adjustments and
                                enhance the overall customer service experience.
                            </p>
                        </div>
        
                    </div>
                    
                </div>

            </div>
        
        </div>

        <div class="h-fit grid gap-10">

            <div class="bg-sb rounded-xl p-4 border border-br h-fit">

                <h2 class="text-white text-xl font-semibold cursor-pointer" @click="show7 = ! show7"><i class="fa-solid fa-user text-accent mr-2 text-lg"></i> Customer Service Process <i class="fa-solid fa-angle-up text-accent float-right text-lg" x-show="show7"></i> <i class="fa-solid fa-angle-down text-accent float-right text-lg" x-cloak x-show="!show7"></i></h2>

                <div x-cloak x-show="show7">

                    <div class=" mt-10 flex flex-col rounded-lg">

                        <div>
                            <h3 class="text-white font-semibold">Step 1: Customer Inquiry</h3>
                            <p class="text-gray-400 mt-2">
                                - The process begins when a customer makes an inquiry, either through your website, email, or
                                phone. <br>
                                - The inquiry is logged into the system and assigned a unique ticket or reference number.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 2: Ticket Assignment</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer inquiry is automatically or manually assigned to a customer service
                                representative based on availability or expertise.<br>
                                - The assigned representative becomes responsible for handling the inquiry
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 3: Ticket Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative updates the ticket with relevant information and any
                                actions taken.<br>
                                - The ticket's status is regularly updated to reflect its progress through the customer service
                                process.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 4: Customer Interaction</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative communicates with the customer to gather additional
                                information, provide assistance, or resolve any issues.<br>
                                - All interactions with the customer, including call logs, emails, or chat transcripts, are
                                recorded in the system and linked to the ticket.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 5: Issue Resolution</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative works to resolve the customer's inquiry or problem
                                promptly and effectively. <br>
                                - If necessary, the representative may collaborate with other departments or escalate the ticket
                                to a higher-level support team.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 6: Ticket Closure</h3>
                            <p class="text-gray-400 mt-2">
                                - Once the customer's inquiry is resolved or the issue is addressed to the customer's
                                satisfaction, the ticket is marked as "resolved" or "closed."<br>
                                - The customer is informed of the resolution and asked for feedback on their experience with
                                customer service.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 7: Customer Feedback</h3>
                            <p class="text-gray-400 mt-2">
                                - Customer feedback is collected through surveys, ratings, or comments related to their
                                interaction with customer service.<br>
                                - The feedback is recorded in the system for analysis and improvement purposes.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 8: Performance Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - Key performance metrics for the customer service process are monitored, such as response time,
                                ticket resolution time, customer satisfaction scores, and ticket volume.<br>
                                - Performance trends and insights are displayed on the sales dashboard for easy monitoring and
                                analysis.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 9: Continuous Improvement</h3>
                            <p class="text-gray-400 mt-2">
                                - Regularly review the customer service process and metrics to identify areas for
                                improvement.<br>
                                - Use the insights gathered from customer feedback and performance data to make adjustments and
                                enhance the overall customer service experience.
                            </p>
                        </div>
        
                    </div>
                    
                </div>

            </div>

            <div class="bg-sb rounded-xl p-4 border border-br h-fit">

                <h2 class="text-white text-xl font-semibold cursor-pointer" @click="show8 = ! show8"><i class="fa-solid fa-user text-accent mr-2 text-lg"></i> Customer Service Process <i class="fa-solid fa-angle-up text-accent float-right text-lg" x-show="show8"></i> <i class="fa-solid fa-angle-down text-accent float-right text-lg" x-cloak x-show="!show8"></i></h2>

                <div x-cloak x-show="show8">

                    <div class=" mt-10 flex flex-col rounded-lg">

                        <div>
                            <h3 class="text-white font-semibold">Step 1: Customer Inquiry</h3>
                            <p class="text-gray-400 mt-2">
                                - The process begins when a customer makes an inquiry, either through your website, email, or
                                phone. <br>
                                - The inquiry is logged into the system and assigned a unique ticket or reference number.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 2: Ticket Assignment</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer inquiry is automatically or manually assigned to a customer service
                                representative based on availability or expertise.<br>
                                - The assigned representative becomes responsible for handling the inquiry
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 3: Ticket Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative updates the ticket with relevant information and any
                                actions taken.<br>
                                - The ticket's status is regularly updated to reflect its progress through the customer service
                                process.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 4: Customer Interaction</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative communicates with the customer to gather additional
                                information, provide assistance, or resolve any issues.<br>
                                - All interactions with the customer, including call logs, emails, or chat transcripts, are
                                recorded in the system and linked to the ticket.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 5: Issue Resolution</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative works to resolve the customer's inquiry or problem
                                promptly and effectively. <br>
                                - If necessary, the representative may collaborate with other departments or escalate the ticket
                                to a higher-level support team.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 6: Ticket Closure</h3>
                            <p class="text-gray-400 mt-2">
                                - Once the customer's inquiry is resolved or the issue is addressed to the customer's
                                satisfaction, the ticket is marked as "resolved" or "closed."<br>
                                - The customer is informed of the resolution and asked for feedback on their experience with
                                customer service.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 7: Customer Feedback</h3>
                            <p class="text-gray-400 mt-2">
                                - Customer feedback is collected through surveys, ratings, or comments related to their
                                interaction with customer service.<br>
                                - The feedback is recorded in the system for analysis and improvement purposes.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 8: Performance Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - Key performance metrics for the customer service process are monitored, such as response time,
                                ticket resolution time, customer satisfaction scores, and ticket volume.<br>
                                - Performance trends and insights are displayed on the sales dashboard for easy monitoring and
                                analysis.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 9: Continuous Improvement</h3>
                            <p class="text-gray-400 mt-2">
                                - Regularly review the customer service process and metrics to identify areas for
                                improvement.<br>
                                - Use the insights gathered from customer feedback and performance data to make adjustments and
                                enhance the overall customer service experience.
                            </p>
                        </div>
        
                    </div>
                    
                </div>

            </div>

            <div class="bg-sb rounded-xl p-4 border border-br h-fit">

                <h2 class="text-white text-xl font-semibold cursor-pointer" @click="show9 = ! show9"><i class="fa-solid fa-user text-accent mr-2 text-lg"></i> Customer Service Process <i class="fa-solid fa-angle-up text-accent float-right text-lg" x-show="show9"></i> <i class="fa-solid fa-angle-down text-accent float-right text-lg" x-cloak x-show="!show9"></i></h2>

                <div x-cloak x-show="show9">

                    <div class=" mt-10 flex flex-col rounded-lg">

                        <div>
                            <h3 class="text-white font-semibold">Step 1: Customer Inquiry</h3>
                            <p class="text-gray-400 mt-2">
                                - The process begins when a customer makes an inquiry, either through your website, email, or
                                phone. <br>
                                - The inquiry is logged into the system and assigned a unique ticket or reference number.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 2: Ticket Assignment</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer inquiry is automatically or manually assigned to a customer service
                                representative based on availability or expertise.<br>
                                - The assigned representative becomes responsible for handling the inquiry
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 3: Ticket Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative updates the ticket with relevant information and any
                                actions taken.<br>
                                - The ticket's status is regularly updated to reflect its progress through the customer service
                                process.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 4: Customer Interaction</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative communicates with the customer to gather additional
                                information, provide assistance, or resolve any issues.<br>
                                - All interactions with the customer, including call logs, emails, or chat transcripts, are
                                recorded in the system and linked to the ticket.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 5: Issue Resolution</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative works to resolve the customer's inquiry or problem
                                promptly and effectively. <br>
                                - If necessary, the representative may collaborate with other departments or escalate the ticket
                                to a higher-level support team.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 6: Ticket Closure</h3>
                            <p class="text-gray-400 mt-2">
                                - Once the customer's inquiry is resolved or the issue is addressed to the customer's
                                satisfaction, the ticket is marked as "resolved" or "closed."<br>
                                - The customer is informed of the resolution and asked for feedback on their experience with
                                customer service.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 7: Customer Feedback</h3>
                            <p class="text-gray-400 mt-2">
                                - Customer feedback is collected through surveys, ratings, or comments related to their
                                interaction with customer service.<br>
                                - The feedback is recorded in the system for analysis and improvement purposes.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 8: Performance Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - Key performance metrics for the customer service process are monitored, such as response time,
                                ticket resolution time, customer satisfaction scores, and ticket volume.<br>
                                - Performance trends and insights are displayed on the sales dashboard for easy monitoring and
                                analysis.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 9: Continuous Improvement</h3>
                            <p class="text-gray-400 mt-2">
                                - Regularly review the customer service process and metrics to identify areas for
                                improvement.<br>
                                - Use the insights gathered from customer feedback and performance data to make adjustments and
                                enhance the overall customer service experience.
                            </p>
                        </div>
        
                    </div>
                    
                </div>

            </div>

        </div>

        <div class="h-fit grid gap-10">

            <div class="bg-sb rounded-xl p-4 border border-br h-fit">

                <h2 class="text-white text-xl font-semibold cursor-pointer" @click="show10 = ! show10"><i class="fa-solid fa-user text-accent mr-2 text-lg"></i> Customer Service Process <i class="fa-solid fa-angle-up text-accent float-right text-lg" x-show="show10"></i> <i class="fa-solid fa-angle-down text-accent float-right text-lg" x-cloak x-show="!show10"></i></h2>

                <div x-cloak x-show="show10">

                    <div class=" mt-10 flex flex-col rounded-lg">

                        <div>
                            <h3 class="text-white font-semibold">Step 1: Customer Inquiry</h3>
                            <p class="text-gray-400 mt-2">
                                - The process begins when a customer makes an inquiry, either through your website, email, or
                                phone. <br>
                                - The inquiry is logged into the system and assigned a unique ticket or reference number.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 2: Ticket Assignment</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer inquiry is automatically or manually assigned to a customer service
                                representative based on availability or expertise.<br>
                                - The assigned representative becomes responsible for handling the inquiry
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 3: Ticket Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative updates the ticket with relevant information and any
                                actions taken.<br>
                                - The ticket's status is regularly updated to reflect its progress through the customer service
                                process.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 4: Customer Interaction</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative communicates with the customer to gather additional
                                information, provide assistance, or resolve any issues.<br>
                                - All interactions with the customer, including call logs, emails, or chat transcripts, are
                                recorded in the system and linked to the ticket.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 5: Issue Resolution</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative works to resolve the customer's inquiry or problem
                                promptly and effectively. <br>
                                - If necessary, the representative may collaborate with other departments or escalate the ticket
                                to a higher-level support team.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 6: Ticket Closure</h3>
                            <p class="text-gray-400 mt-2">
                                - Once the customer's inquiry is resolved or the issue is addressed to the customer's
                                satisfaction, the ticket is marked as "resolved" or "closed."<br>
                                - The customer is informed of the resolution and asked for feedback on their experience with
                                customer service.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 7: Customer Feedback</h3>
                            <p class="text-gray-400 mt-2">
                                - Customer feedback is collected through surveys, ratings, or comments related to their
                                interaction with customer service.<br>
                                - The feedback is recorded in the system for analysis and improvement purposes.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 8: Performance Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - Key performance metrics for the customer service process are monitored, such as response time,
                                ticket resolution time, customer satisfaction scores, and ticket volume.<br>
                                - Performance trends and insights are displayed on the sales dashboard for easy monitoring and
                                analysis.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 9: Continuous Improvement</h3>
                            <p class="text-gray-400 mt-2">
                                - Regularly review the customer service process and metrics to identify areas for
                                improvement.<br>
                                - Use the insights gathered from customer feedback and performance data to make adjustments and
                                enhance the overall customer service experience.
                            </p>
                        </div>
        
                    </div>
                    
                </div>

            </div>

            <div class="bg-sb rounded-xl p-4 border border-br h-fit">

                <h2 class="text-white text-xl font-semibold cursor-pointer" @click="show11 = ! show11"><i class="fa-solid fa-user text-accent mr-2 text-lg"></i> Customer Service Process <i class="fa-solid fa-angle-up text-accent float-right text-lg" x-show="show11"></i> <i class="fa-solid fa-angle-down text-accent float-right text-lg" x-cloak x-show="!show11"></i></h2>

                <div x-cloak x-show="show11">

                    <div class=" mt-10 flex flex-col rounded-lg">

                        <div>
                            <h3 class="text-white font-semibold">Step 1: Customer Inquiry</h3>
                            <p class="text-gray-400 mt-2">
                                - The process begins when a customer makes an inquiry, either through your website, email, or
                                phone. <br>
                                - The inquiry is logged into the system and assigned a unique ticket or reference number.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 2: Ticket Assignment</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer inquiry is automatically or manually assigned to a customer service
                                representative based on availability or expertise.<br>
                                - The assigned representative becomes responsible for handling the inquiry
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 3: Ticket Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative updates the ticket with relevant information and any
                                actions taken.<br>
                                - The ticket's status is regularly updated to reflect its progress through the customer service
                                process.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 4: Customer Interaction</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative communicates with the customer to gather additional
                                information, provide assistance, or resolve any issues.<br>
                                - All interactions with the customer, including call logs, emails, or chat transcripts, are
                                recorded in the system and linked to the ticket.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 5: Issue Resolution</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative works to resolve the customer's inquiry or problem
                                promptly and effectively. <br>
                                - If necessary, the representative may collaborate with other departments or escalate the ticket
                                to a higher-level support team.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 6: Ticket Closure</h3>
                            <p class="text-gray-400 mt-2">
                                - Once the customer's inquiry is resolved or the issue is addressed to the customer's
                                satisfaction, the ticket is marked as "resolved" or "closed."<br>
                                - The customer is informed of the resolution and asked for feedback on their experience with
                                customer service.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 7: Customer Feedback</h3>
                            <p class="text-gray-400 mt-2">
                                - Customer feedback is collected through surveys, ratings, or comments related to their
                                interaction with customer service.<br>
                                - The feedback is recorded in the system for analysis and improvement purposes.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 8: Performance Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - Key performance metrics for the customer service process are monitored, such as response time,
                                ticket resolution time, customer satisfaction scores, and ticket volume.<br>
                                - Performance trends and insights are displayed on the sales dashboard for easy monitoring and
                                analysis.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 9: Continuous Improvement</h3>
                            <p class="text-gray-400 mt-2">
                                - Regularly review the customer service process and metrics to identify areas for
                                improvement.<br>
                                - Use the insights gathered from customer feedback and performance data to make adjustments and
                                enhance the overall customer service experience.
                            </p>
                        </div>
        
                    </div>
                    
                </div>

            </div>

            <div class="bg-sb rounded-xl p-4 border border-br h-fit">

                <h2 class="text-white text-xl font-semibold cursor-pointer" @click="show12 = ! show12"><i class="fa-solid fa-user text-accent mr-2 text-lg"></i> Customer Service Process <i class="fa-solid fa-angle-up text-accent float-right text-lg" x-show="show12"></i> <i class="fa-solid fa-angle-down text-accent float-right text-lg" x-cloak x-show="!show12"></i></h2>

                <div x-cloak x-show="show12">

                    <div class=" mt-10 flex flex-col rounded-lg">

                        <div>
                            <h3 class="text-white font-semibold">Step 1: Customer Inquiry</h3>
                            <p class="text-gray-400 mt-2">
                                - The process begins when a customer makes an inquiry, either through your website, email, or
                                phone. <br>
                                - The inquiry is logged into the system and assigned a unique ticket or reference number.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 2: Ticket Assignment</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer inquiry is automatically or manually assigned to a customer service
                                representative based on availability or expertise.<br>
                                - The assigned representative becomes responsible for handling the inquiry
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 3: Ticket Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative updates the ticket with relevant information and any
                                actions taken.<br>
                                - The ticket's status is regularly updated to reflect its progress through the customer service
                                process.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 4: Customer Interaction</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative communicates with the customer to gather additional
                                information, provide assistance, or resolve any issues.<br>
                                - All interactions with the customer, including call logs, emails, or chat transcripts, are
                                recorded in the system and linked to the ticket.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 5: Issue Resolution</h3>
                            <p class="text-gray-400 mt-2">
                                - The customer service representative works to resolve the customer's inquiry or problem
                                promptly and effectively. <br>
                                - If necessary, the representative may collaborate with other departments or escalate the ticket
                                to a higher-level support team.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 6: Ticket Closure</h3>
                            <p class="text-gray-400 mt-2">
                                - Once the customer's inquiry is resolved or the issue is addressed to the customer's
                                satisfaction, the ticket is marked as "resolved" or "closed."<br>
                                - The customer is informed of the resolution and asked for feedback on their experience with
                                customer service.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 7: Customer Feedback</h3>
                            <p class="text-gray-400 mt-2">
                                - Customer feedback is collected through surveys, ratings, or comments related to their
                                interaction with customer service.<br>
                                - The feedback is recorded in the system for analysis and improvement purposes.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 8: Performance Tracking</h3>
                            <p class="text-gray-400 mt-2">
                                - Key performance metrics for the customer service process are monitored, such as response time,
                                ticket resolution time, customer satisfaction scores, and ticket volume.<br>
                                - Performance trends and insights are displayed on the sales dashboard for easy monitoring and
                                analysis.
                            </p>
                        </div>
        
                    </div>
        
                    <div class="w-full text-center my-5">
                        <i class="fa-solid fa-arrow-down text-accent text-4xl"></i>
                    </div>
        
                    <div class=" mt-5 flex flex-col rounded-lg">
        
                        <div>
                            <h3 class="text-white font-semibold">Step 9: Continuous Improvement</h3>
                            <p class="text-gray-400 mt-2">
                                - Regularly review the customer service process and metrics to identify areas for
                                improvement.<br>
                                - Use the insights gathered from customer feedback and performance data to make adjustments and
                                enhance the overall customer service experience.
                            </p>
                        </div>
        
                    </div>
                    
                </div>

            </div>

        </div>

    </div>

</div>