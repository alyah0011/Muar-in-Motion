# Muar-in-Motion

# Introduction
Muar-in-Motion is a project initiated by The Muara (FG 21), a flagship project under the IIUM Flagship Project. Developed in collaboration between the Kulliyyah of Languages and Management (KLM) and Tanjung Kunang Enterprise, the project aims to promote and enhance the tourism industry in the Muar region [8]. The Muar-in-Motion web application is a vital tool designed to assist in achieving this mission. It serves as an intuitive platform for potential tourists, providing easy access to important information, including details about tourist attractions, transportation options, accommodation, and a seamless communication platform for visitors to connect and plan their trips.

## Background of the Problem
This project focuses on enhancing and promoting tourism in Muar. The existing flagship website lacks tourist-specific information, hindering effective travel planning. While other places have adopted smart tourism, Muar is yet to implement such a system. Therefore, there is a need for a new website that is tourist-centered, helping visitors plan their trips to Muar effectively.

## Problem Statement
Tourists exploring Muar often face challenges in navigating and locating specific information, hindering their trip planning. To address this, a centralized and user-friendly platform is essential, providing comprehensive information on Muar's attractions, accommodations, transportation options, and events. Improved accessibility to this information enhances tourists' experiences, aligning with the Muara Flagship project's vision of boosting the tourism industry in Muar.

## Objective
The system's development aims to promote and enhance tourism in Muar by meeting the needs of tourists, driving economic growth, and showcasing the region's attractions. The system should simplify travel planning, encourage visitor engagement, and feature a user-friendly interface for smooth navigation.

## Project Scope
1. **Views:**
   - Admin can log in to manage posts in tourist attractions, transportation, accommodation, events, and monitor the forum for malicious content.
   - Visitors can view home, attractions, transportation, accommodation, forum, event, and about us pages. They can bookmark content, create a to-do-list, and participate in discussions if logged in.
  
2. **Target User:**
   - Potential tourists of Muar, Johor.

3. **Platform Used:**
   - PHP, Laravel, MYSQL, Figma, Draw.io, and Procreate

## Literature Review
The main objective of this literature review is to identify the most suitable features for The Muar-in-Motion website which has the aim of boosting and promoting tourism in the Muar region. In this review, analysing and evaluating similar systems to the one will be developing will be the focus. By examining the advantages and disadvantages of these systems, hope to identify potential opportunities and pitfalls to avoid while developing this system.

Five websites were selected for the literature review: Visit Singapore [1], Sydney.com [2], Visit California [3], Japan.travel [4], and Tour MuOve [5]. By comparing these websites, we can identify the fundamental aspects of tourism websites. Moreover, a few websites were particularly impressive, highlighting potential additional features that could enhance the Muar-in Motion website. The results are summarized and presented in Table 1.

![image](https://github.com/alyah0011/Muar-in-Motion/assets/121216138/15f05169-d8b5-438d-b995-5d815a84dcd0 "Table 1: Comparison of Similar Systems")

In adapting the project, we looked at similar systems in Table 1 and decided on the features to include in the Muar-in-Motion website. These include sections for "Things to Do" and "Places to Visit," an Events Calendar, a simple Search Bar, the ability to Bookmark, options to Filter, organized content, an attractive design, details about Accommodation and Transportation, integration with Google Maps, a way for administrators to Log in, a platform for discussions, and the addition of a To-do List. The To-do List is an extra feature that lets users plan and keep track of activities for specific days, allowing them to create multiple lists for different occasions.

## Methodology

A. **Development Approach**
System development methodologies are used to provide a structured approach to developing systems. These methodologies are essential for managing system development from planning to implementation and maintenance. There are a variety of options available, including the Waterfall model, System Development Life Cycle (SDLC), Agile methodology, Rapid Application Development (RAD), Scrum, Spiral model, and others. Choosing the appropriate methodology for a specific project is crucial to ensure that the project's goals are achieved within the expected timeframe and budget. After conducting thorough research and considering the project’s unique requirements, goals, and available resources, below is the methodology that has been decided for this project's system development.

![image](https://github.com/alyah0011/Muar-in-Motion/assets/121216138/d08e562f-253b-43d2-92c3-618ddaddc4be  "Fig. 1 System Development Life Cycle")

According to Pinheiro (2018) and Fig. 1 illustrated above, there are 6 steps to be included in the System Development Life Cycle [7] which are: 

1. **Planning:**
   - This is the initial phase of the SDLC process.
   - The developer works with stakeholders to identify and document the system's requirements.
   - A survey questionnaire will be conducted to get requirements from end users.
   - During this phase, the developer must define the goals and objectives of the system, identify the users and their needs, and determine the functional and non-functional requirements.

2. **Analysis:**
   - In this phase, the developer reviews the requirements and creates a detailed plan for the system.
   - They evaluate the technical feasibility of the project, determine the hardware and software requirements, and identify any potential risks or constraints.

3. **Design:**
   - The Design phase is divided into three parts: System Design, Database Design, and Interface Design.
   - For the System Design, use case diagrams, along with sequence diagrams and activity diagrams, will be utilized to visualize the flow of the system.
   - The design should be comprehensive enough to guide the developer during the coding phase.

4. **Coding:**
   - This is the phase where the actual development of the system takes place.
   - The coding phase involves writing code for the system components based on the design documents.
   - The languages that will be used for this system development are PHP and Laravel.

5. **Testing:**
   - This is a crucial phase of the SDLC process where the developer tests the system to ensure that it meets the requirements and performs as expected.
   - The testing phase involves doing the User Acceptance Test to ensure the system meets end users' needs and is ready for deployment.

6. **Maintenance:**
   - After the Testing phase, constructive feedback from end users and stakeholders is obtained.
   - This feedback is reviewed by the team, and the system will be subjected to updates to fix any issues that arise.
   - This phase is crucial to ensure the system remains effective and efficient over time.

B. **System Design**
This section involves analysing the requirements and creating use case diagram to aid in understanding for developer. 

![image](https://github.com/alyah0011/Muar-in-Motion/assets/121216138/d3faa6a4-b29a-4e15-9a3e-b3ae2659976b "Fig. 2 Use Case Diagram")

Fig.2 shows the use case diagram which illustrates a list of key business actors, and their roles. The "Admin" or "Website Master" is responsible for content updates, user feedback review, and website performance monitoring. On the other hand, the "User" or "Visitor" refers to individuals who visit and engage with the website's features.

The "Browse Content" use case involves Users exploring website content. Users also utilize the "Search" use case to find relevant information through keyword queries. "Filter" allows Users to refine event searches by date, while "Log In" facilitates user access to registered accounts. Users can create new accounts via the "Sign Up" use case. "Bookmark Content" enables Users to save attractions for later reference, and "Leave Review" lets Users provide feedback on attractions. Additionally, the "Write in Forum" use case allows logged-in Users to share their thoughts related to the region on the forum page. Users can generate task lists for specific dates using the "Create To-Do-List" feature. Lastly, the "Add Content" use case allows Admins to contribute new posts, maintaining up-to-date website information. These requirements collectively shape the functionality and user experience of the Muar-in-Motion website.

C. **Database Design**

![image](https://github.com/alyah0011/Muar-in-Motion/assets/121216138/37b0ec84-890c-429e-a1b9-1f438b52e158 "Fig. 3 Entity Relationship Diagram")

Figure 3 displays the Entity Relationship Diagram (ERD) for the Muar-in-Motion website, involving 8 entities.

1. **User:**
   - The "User" table contains information about individuals using the system.
   - Attributes include a unique user ID, a password for authentication, the user's name, and their email address.

2. **Admin:**
   - The "Admin" table stores data related to administrators of the system.
   - Includes a unique admin ID and an admin password for secure access.

3. **Attraction:**
   - The "Attraction" table holds details about various attractions.
   - Attributes include a unique attraction ID, categories characterizing the attraction, its name, a description, and latitude and longitude coordinates indicating its location.

4. **Event:**
   - The "Event" table records information about events.
   - Attributes include a unique event ID, the event's name, a description of the event, its date, and the scheduled time.

5. **Forum:**
   - The "Forum" table manages forum messages.
   - Attributes include a unique forum ID, a timestamp for when the message was posted, the subject of the message, a description of the message, and an attachment file associated with it.

6. **Bookmark:**
   - The "Bookmark" table facilitates the bookmarking of attractions.
   - Attributes include a unique bookmark ID, categories, the name of the bookmark, a description, and latitude and longitude coordinates for the bookmarked location.

7. **To-do-List:**
   - The "To-do-List" table organizes user tasks.
   - Attributes include a unique to-do list ID, a title for the to-do list, and a date for which the list is relevant.

8. **Task:**
   - The "Task" table manages individual tasks.
   - Attributes include a unique task ID and a name describing the task.
  
D. **System Output**

**User's View**
This section presents the user's views of Muar-in-Motion, encompassing the Homepage, Attraction Pages, Accommodation Pages, Transportation Pages, Event Pages, Forum Page, Search Features, Profile Page, Bookmark Page, and TDL Page. Screenshots of user’s views are shown in figures below.

![image](https://github.com/alyah0011/Muar-in-Motion/assets/121216138/c3ad3434-a9c0-4286-bbb4-58a4aec896a3 "Fig. 4 Homepage")

![image](https://github.com/alyah0011/Muar-in-Motion/assets/121216138/3ac8914b-614f-44e0-8799-041537e66f7a "Fig. 5 Attraction Page")
![image](https://github.com/alyah0011/Muar-in-Motion/assets/121216138/21631276-ca7f-4710-8b90-7cbc948908b0 "Fig. 6 Attraction Category Page")
![image](https://github.com/alyah0011/Muar-in-Motion/assets/121216138/56a710da-9026-4c59-805d-e6c7bd55c6ec "Fig. 7 Attraction Detail Page")

![image](https://github.com/alyah0011/Muar-in-Motion/assets/121216138/89dd1a0e-b6aa-4adf-9acb-8f384aa02254 "Fig. 8 Accommodation & Transporattion Page")
![image](https://github.com/alyah0011/Muar-in-Motion/assets/121216138/bad10743-c56a-4086-8b5d-109e142d8f6d "Fig. 9 Accommodation Page")
![image](https://github.com/alyah0011/Muar-in-Motion/assets/121216138/cf6b3b62-d6a1-4f18-9c36-f53daf4232c7 "Fig. 10 Accommodation Detail Page")
![image](https://github.com/alyah0011/Muar-in-Motion/assets/121216138/62901151-7ceb-4601-aff9-b8ac47268bcf "Fig. 11 Transportation Page")

![image](https://github.com/alyah0011/Muar-in-Motion/assets/121216138/81f4d53a-e189-46bf-bae0-eb38713b7970 "Fig. 12 Event Page")
![image](https://github.com/alyah0011/Muar-in-Motion/assets/121216138/97976515-e8ef-47f9-90c7-4fe9294227b7 "Fig. 13 Event Detail Page")

![image](https://github.com/alyah0011/Muar-in-Motion/assets/121216138/959e0754-6d3c-4ec9-9c0a-73875d003e58 "Fig. 14 Forum Page")


















