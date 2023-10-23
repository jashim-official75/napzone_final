@extends('frontend.layouts.app')

@section('styles')
    <style>
        footer#footer {
            background-color: #18212b;
        }

        .sub-sub-heading {
            color: #f2b705;
            font-size: 1.2rem;
        }

        .list-heading {
            color: #f2b705;
        }

    </style>
@endsection

@section('content')
    <!-- ------------------------- Top Action And Top Multiplayer Start ---------------------- -->
    <section id="taandtm" class="section">
        <div class="container">
            <div class="row">
                <h1 class="title">Terms and Conditions</h1>
                <p class="text-white">The Terms and Conditions of Service and the End User License Agreement is an
                    agreement between you and NapZone Games. This controls your access and use of the websites, games, and
                    other interactive software products and services that we run and that link to these Terms (collectively,
                    our 'Services').</p>
                <p class="text-white">Before using the facilities, please carefully study these terms and conditions. In
                    our absolute discretion, we can amend the Terms or change, suspend or terminate any function of the
                    Services in compliance with applicable law at any time. We will inform you of revisions to these Terms
                    (including by posting modified Terms to the Services).</p>
                <p class="text-white font-weight-bold">PLEASE BE AWARE THAT SECTION X INCLUDES A MANDATORY ARBITRATION CLAUSE
                    AND CLASS ACTION WAIVER WHICH CAN IMPACT YOUR RIGHTS FOR SETTLING ANY DISPUTE WITH US.</p>
                <p class="text-white font-weight-bold">YOUR CONSENT IS REQUIRED TO ENTER INTO THESE TERMS ELECTRONICALLY, AND
                    TO THE STORAGE OF RECORDS RELEVANT TO THESE TERMS IN DIGITAL FORM.</p>
                <p class="list-heading font-weight-bold">i. Utilization of services</p>
                <p class="text-white">Restricted License. You can connect and use the Services running operating systems
                    on which the Services are intended to function for your personal, non-commercial, entertainment use
                    only, according to these Terms. The Services are licensed, not vented, to you on limited, revocable,
                    non-sublicensable, non-transferable, and non-exclusive terms. You may not edit, duplicate (except for a
                    distinct reserve and temporary replica necessary to operate the Services), send, upload, view, execute,
                    replicate, publish, construct derivative works from, or modify, sell, rent, lease, sublicense, or
                    otherwise interchange or render available the Services or any portion thereof. Without restricting the
                    validity of the above, you accept that you have no right to sell or otherwise transfer, in whole or in
                    part any of the digital objects, digital currencies, points, or any other material or information from
                    the Services, on internet auction sites (such as eBay or IGE), hack sites, private server sites, gold
                    farming sites, or any other third-party sites or services in exchange of anything in value be it real
                    money or anything else. Other than expressly given to you according to these Terms, you have no access
                    in or to the Services. If you ignore any clause of the terms, your license will be immediately rescinded
                    and revoked.</p>
                <p class="text-white"><b>Additional Terms:</b> Additional terms, conditions, regulations, or
                    instructions for acceptable use ('Additional Terms') are subject to and regulated by some of the
                    services. Via the relevant service, we will make these additional terms accessible to you, in which case
                    your approval of such additional terms is needed prior to the use of the applicable service. If there
                    are any conventions of this Agreement that conflicts with any of the terms and conditions of the
                    Additional Terms, this Agreement shall be superseded by the Additional Terms with reverence to the topic
                    mentioned in the Additional Terms.</p>
                <p class="text-white"><b>Qualification:</b> You reflect that, under applicable law, you are not a person
                    excluded from accessing the Services. You also reflect that you are of the appropriate age in your
                    country, or use the Services only with the consent and under the administration of a parent or legal
                    guardian who has checked and approved these Conditions, in compliance with applicable law. Children (as
                    specified by applicable law) may not provide any personal information or register an account with
                    NapZone Games or other similar Services.</p>
                <p class="text-white"><b>Registration Account:</b> You are expected to register an account with us for
                    some of our services. You may not be able to access any portions or functions of the Services if you are
                    not signed in to your account. You can only provide correct and complete information when creating an
                    account, and will promptly update this information. You will remain anonymous and safe with your
                    username and password and will not use the same password you use with other websites or services. Before
                    transferring to any other devices that you will install the services, you may uninstall and delete the
                    services from the previous one. When you find or otherwise suspect any unauthorized access to or use of
                    your account, you will immediately notify us. NOT GOING AGAINST THE TERMS AND CONDITIONS, YOU AGREE AND
                    ACCEPT THAT YOU SHALL NOT HAVE ANY POSSESSION OR ANY OTHER PROPERTY INTEREST IN YOUR ACCOUNT, AND IN
                    ADDITION, YOU ACCEPT AND AGREE THAT ALL RIGHTS IN AND TO THE ACCOUNT ARE AND WILL BE ALWAYS ALLEGED BY
                    AND INURED TO THE ADVANTAGE OF NapZone Games.
                </p>
                <p class="text-white">We do not accept or acknowledge the exchange of accounts between users. You may
                    not purchase, sell, refer, or exchange any account, and may not propose to do so. Any such effort shall
                    be insignificant and annulled and can direct to the cancellation of the account and its penalization.
                </p>
                <p class="text-white"><b>Software Updates:</b> NapZone Games will provide you updates which may usually
                    be made available at its absolute discretion. You accept and agree that NapZone Games can automatically
                    and remotely deliver updates to you, including by accessing (without limitation) the device/mobile/PC on
                    which you are using the Services. Any notifications issued or made available by NapZone Games shall form
                    part of and be subject to these Terms and Conditions.</p>
                <p class="text-white"><b>Controls for Export:</b> When using the program, you can abide by all relevant
                    export laws and regulations. The Services, or any component thereof, can not be downloaded or otherwise
                    exported or re-exported (a) to any country in which a trade embargo is placed on the United States or
                    (b) to anyone in the United States list of Specially Designated Citizens or the U.S. Treasury Department
                    Table of Denial Orders or liable to EU or EU Member State financial or other sanctions. You reflect and
                    guarantee that you are not, or on any such registry, residing in, under the jurisdiction of any such
                    country.</p>
                <p class="text-white"><b>ransfers through Cross-border:</b> By agreeing to these Terms and Conditions,
                    you agree fully that the enforcement of these Terms and the distribution of the Services which entail
                    the transfer of the information we obtain from your country to other countries, which may not offer the
                    same degree of security as your country of origin or the European Union/European Economic Area.</p>
                <p class="list-heading font-weight-bold">ii. Contents that users have shared</p>
                <p class="text-white">You are and will remain entirely liable for all messages, photographs, videos,
                    audio, content, or sections of the contents of databases, databases, contents, and any other materials
                    or information that you publish or transfer through the Services, including, without exception to any
                    text, voice communications or recordings or gameplay videos ('User Content').</p>
                <p class="text-white">You reflect and guarantee that the content that you upload or transfer will not:
                </p>
                <ul class="text-white">
                    <li class="ml-5">Violation of a third party's copyright, trademark, database, or other
                        intellectual property rights. You reflect and guarantee that you possess or have the required
                        licenses, privileges, consents, and approvals for the uploading or transmission of User Content on
                        the Services and that the User Content does not infringe any privacy or marketing promotions of the
                        terms or rights of any third party.</li>
                    <li class="ml-5">Promoting illegal sweepstakes or tournaments and not promoting any form of
                        lottery or gambling.</li>
                    <li class="ml-5">Prevent or hinder the discovery of information relating to the Services by
                        other users.</li>
                    <li class="ml-5">Facilitate or encourage activity that includes illicit content, pornography,
                        piracy, unlawful drugs, underage drinking, or socially careless conduct due to alcohol or substance
                        use at NapZone Games at absolute discretion (such as drinking and driving).</li>
                    <li class="ml-5">Teach users how to produce explosives, guns, narcotics, illicit or illegal or
                        dangerous products, or how to participate in violent or illegal conduct or organizations under
                        applicable laws, including, without limitation, terrorist threats or activities.</li>
                </ul>
                <p class="text-white">You accept and understand that NapZone Games may (but not necessarily) manage,
                    track, evaluate and archive any User Content that you publish, distribute, or make it available on or
                    through the Services (that includes the content of your verbal or written communications) and may,
                    without notifying you before and in its private ruling, delete User Content at any moment for any or no
                    reason. You accept that any tracking or logging may be done using software that may be installed to
                    access or use the Services when you download software. NapZone Games takes no responsibility for any
                    failure to delete, or any interruption in removing, User Content, unless necessary by law, and assumes
                    no liability or obligation for the use and/or possession of User Content.</p>
                <p class="text-white">You, therefore, give NapZone Games the privilege and authorization to utilize your
                    User Content which is free of royalties, everlasting, irreversible, completely manageable, and capable
                    of being sublicensed, not exclusive and universal and to be used in any and all medium for whichever
                    manner and purpose (including and not limited to profitable, publicity and advertising). To be used to
                    the maximum degree allowable by relevant law including and not limited to the privileges to replicate,
                    alter, execute, showcase, distribute, publish, transfer or otherwise communicated to the public or the
                    production or adaptation, use or otherwise misuse of derivative works by any means, whether now known or
                    unknown and without any further notice or reimbursement of any sort to you. You waive, to the degree
                    allowed by applicable law, any moral rights of paternity, publishing, credibility, or attribution with
                    regard to the use and enjoyment of User Material by NapZone Games and other players in connection with
                    the Services. The issuance of a license to NapZone Games and the waiver of any relevant moral rights
                    referred to above shall survive any termination or expiry of the Terms.</p>
                <p class="list-heading font-weight-bold">iii. Knowledgeable Property and Rights of Violation</p>
                <p class="text-white">Services (including any modifications thereof) are protected by the United States,
                    European Union, and other countries' copyright and other intellectual property legislation. Our
                    trademarks and/or service marks are NapZone Games and our related logos and names. The trademarks,
                    service marks, or logos of their respective owners are other trademarks, service marks, labels, and
                    logos used by or by the Services. Without our prior written permission, you are not given any right or
                    license with respect to any of these trademarks, service marks, or logos. NapZone Games holds and
                    maintains all ownership, title, and equity in and to the Facilities and all aspects thereof, including,
                    without restriction, all intellectual property rights.</p>
                <p class="text-white">Any content made accessible by the Services which have watermarks and is protected
                    by other technology for the management of digital rights, which will limit how you can view and use the
                    Services. The Services can access and monitor your computer for third-party programs or software that is
                    forbidden under these Terms ('Unauthorized Third-Party Software) (including, without limitation, hard
                    drive and other storage equipment, central processing unit, random access memory, video card, and
                    peripheral hardware, software and applications). In the circumstance that any Prohibited Third-Party
                    Software is found, NapZone Games will collect additional information, including, without restriction,
                    your user name, descriptions of the Unauthorized Third-Party Software and the time and date, as defined
                    in the NapZone Games Privacy Policy and may use this information to implement these Terms and Conditions
                    in compliance with the NapZone Games Privacy Policy.</p>
                <p class="text-white">NapZone Games is always delighted to hear from our players and followers, and we
                    welcome reviews and suggestions about our facilities. Any thoughts, opinions, suggestions, comments,
                    reviews or other inputs (including, without restriction, those that provide feedback on or recommend new
                    content, features, products, or related ideas on our Services) (collectively, 'Feedback') will not be
                    regarded as confidential or proprietary regardless of whether you send such feedback in a public or
                    private medium. This means that if you give NapZone Games Feedback, you forfeit all rights to it and
                    allow it to be shared and used for any reason by us or others, including without limitation using,
                    distributing, and commercially exploiting the Feedback in any manner that we deem fit without warning or
                    reimbursement to you. NapZone Games does not return or frequently consider any reviews we receive and
                    has no responsibility to include any feedback relating to you.</p>
                <p class="text-white">We value others' rights to intellectual property. If you feel in good conscience
                    that your copyrighted work or other intellectual property has been infringed and is accessible via our
                    Services, you can warn our Appointed Agent by submitting the following details in writing through
                    contacting us as stated below:</p>
                <ul class="text-white">
                    <li class="ml-5">Identification of the work or intellectual property that has been patented or
                        of a sample collection of works or property alleged to have been infringed.</li>
                    <li class="ml-5">Identification of the content suspected to be violating and fairly adequate
                        knowledge to permit us to locate the material.</li>
                    <li class="ml-5">Your identity, contact details, and email address, so that we can contact you
                        if necessary.</li>
                    <li class="ml-5">An assertion that the material found in the document is correct and that the
                        suing party is entitled, under penalty of perjury, to act on behalf of the holders of an exclusive
                        right that is allegedly infringed.</li>
                    <li class="ml-5">A determination that you have a good faith conviction that the owner of the
                        intellectual property, its representative, or the statute is not allowed to use the content in the
                        manner complained of.</li>
                    <li class="ml-5">A tangible or electronic signature of a person allowed to act on behalf of
                        the proprietor of an allegedly infringed exclusive right.</li>
                </ul>
                <p class="text-white">If the content is deleted, a notification will be issued from the person that
                    uploaded the content that it was deleted because of the suspected violation. Your contact information,
                    including your email address and the name of your company or customer, and the contents of your survey,
                    may be issued by us. If the group that posted the content feels that the material may not have been
                    deleted, they may be allowed to contact you individually to attempt and fix the problem, and under
                    existing legislation, they will be entitled to send a counter-notification. We revoke the rights of
                    consumers that breach intellectual property laws repeatedly.</p>
                <p class="list-heading font-weight-bold">iv. Digital currency and digital items</p>
                <p class="text-white">You can visit online and in-game stores when using the Facilities, where you can
                    obtain and use NapZone Games virtual currency and downloadable, in-game objects (including early access
                    to games still in production, as may be offered from time to time). In conjunction with the use of the
                    facilities, NapZone Games can also make points available to you.</p>
                <p class="text-white">DIGITAL CONTENT, LIKE VIRTUAL CONTENT TRADED FOR PREPAID PAYMENT INSTRUMENTS, IS
                    KNOWN AS GOODS OR SERVICES AND IS NOT PREPAID PAYMENT INSTRUMENTS. There is no "real-world" value for
                    virtual currencies and points, but in-game items can be exchanged. Things from those retailers are not
                    bought by you but are licensed under these Conditions to you instead. IRRESPECTIVE OF THE DELIBERATION
                    SPECIFIED OR REMUNERATED IN RETURN FOR VIRTUAL MONEY, YOU HAVE NO OWNERSHIP RIGHTS IN THE VIRTUAL
                    CURRENCY OBJECTS PURCHASED.</p>
                <p class="text-white">Any rates, estimates, and specifications made or referred to in our Services do
                    not constitute a bid and can be removed or modified at any time prior to the express approval by NapZone
                    Games of your request. You consent to pay, to the degree allowed by applicable statute, all costs, fees,
                    and applicable taxes paid by you or any other person using your account or arising from the use of the
                    Services on your computer at the price(s) in place at the time of those charges. NapZone Games can
                    adjust the price of the services at any time in compliance with applicable legislation. NapZone Games
                    retains the right to alert you of any mistakes in the summary of the product or errors in pricing prior
                    to the dispatch of the product. If that occurs and you wish to continue the order fulfillment, you agree
                    that the goods or service will be delivered in compliance with the updated definition or price corrected
                    above.</p>
                <p class="text-white">You will be able to access different payment types such as credit card, direct
                    debit, PayPal, etc. while accessing virtual currencies through the Services. When you use third-party
                    payment and billing services, such as PayPal, the additional terms, terms, and costs of the service
                    apply. Any federal, state, and local taxes involved with the receipt or use of the interactive goods you
                    buy from NapZone Games are your responsibility to pay.</p>
                <p class="text-white">For transactions in virtual currencies, certain minimums may apply, and certain
                    maximums may apply based on the type of sale. NapZone Games retains the right to adjust, at any time
                    without warning, the maximum and minimum sums applicable to transactions of virtual currencies, in
                    compliance with applicable legislation.</p>
                <p class="text-white">YOU RECOGNIZE AND ACCEPT THAT NapZone Games WOULD NOT PROVIDE REFUNDS FOR VIRTUAL
                    CURRENCIES OR DIGITAL, IN-GAME GOODS UNDER CERTAIN CONDITIONS, INCLUDING WITHOUT LIMITATION TERMINATION
                    OR EXPIRATION OF YOUR ACCOUNT, THESE TERMS, OR THE FACILITIES, EXCEPT AS SPECIFICALLY PERMITTED BY
                    APPLICABLE LAW. If an account is permanently banned, all content licenses and virtual currency balances
                    associated with the suspended NapZone Games shall have no duty or liability to you and shall not refund
                    you for any missing virtual money, points, products, or experience due to the infringement of these
                    Terms and Conditions.</p>
                <p class="text-white">Objects may expire. Any item you buy using virtual currencies or points will be
                    included in your account before the expiry date, expiration, or expiry date of the item, these Terms, or
                    the Facilities. Item rates and availability are subject to change without warning, in compliance with
                    applicable legislation.</p>
                <p class="text-white">We may decide to terminate your account if a charge you authorize us to make to
                    your credit card or SMS/phone billing can not be processed or returned to us unpaid or refunded for any
                    reason, and if such an occurrence happens, you shall automatically give us pay for that charge by using
                    another credit card or other payment mechanism. For any credit card or bank-related costs or penalties
                    relating to any of your transactions, we are not liable or accountable. We reserve the right to restrict
                    the order quantity on any item without prior notice or to fail to supply you with any item. Prior to our
                    approval thereof, you can be asked to check the transaction records.</p>
                <p class="text-white">Despite various Clauses, the laws of your nation which refer to the purchasing of
                    virtual products and services supplied to you by NapZone Games and you may have the rights or remedies
                    provided for under such laws which are available in addition to, or to the degree that, the rights or
                    remedies set out in these Terms are conflicting with, instead of.</p>
                <p class="list-heading font-weight-bold">v. Code of Behaviour</p>
                <p class="text-white">You should not use the Services in any form that is unlawful, in NapZone Games
                    absolute discretion, which may damage, disable, overwhelm, or impair the Services, or interfere with the
                    use and enjoyment of the Services by NapZone Games or any other individual. Without restricting the
                    generality of the above, forbidden actions, according to applicable law, includes the following:</p>
                <ul class="text-white">
                    <li class="ml-5">Use any hacks, glitches, bots, or third-party software that either alter,
                        temporarily or permanently, the code or user interface of the Services, whether locally on your
                        computer or on servers, or use any program, software, or technology that is not specifically allowed
                        by us that allows hacking, power-leveling, or execution of game tasks that cannot be done without
                        the use of succor.</li>
                    <li class="ml-5">Reverse engineering, source code derivation, modification, decompilation,
                        disassembly or otherwise determining or attempting to determine any source code, algorithms,
                        processes, or procedures used or implemented in the Services or any component thereof.</li>
                    <li class="ml-5">Identifying another person or organization or otherwise misrepresenting your
                        association, name, or sources of the materials you transmit or misrepresenting NapZone Games
                        acceptance of your statements or behavior.</li>
                    <li class="ml-5">Usage of any robot, spider, web search/retrieval application, or other manual
                        or automated system or mechanism to retrieve, catalog, mine, or otherwise replicate or bypass the
                        Service's navigational structure or presentation, or any content found within.</li>
                    <li class="ml-5">Drop, change or cover any proprietary notices, legends, icons, or logos
                        (including any watermark or other digital rights protection technologies or other information) found
                        on or inside the Services by copyright, trademark, patent, or other proprietary notice.</li>
                    <li class="ml-5">Undertaking any activity on our network or infrastructure that imposes an
                        unfair or overly high load.</li>
                    <li class="ml-5">Sponsoring, distribution, or production of matchmaking software for the
                        Services without the prior written permission of NapZone Games or the creation, use, or management
                        of any unauthorized links to the Services.</li>
                    <li class="ml-5">Surveilling, emulating, or redirecting the communication protocols used by
                        NapZone Games or its designated parties in any way, including without limitation by emulating
                        protocols, tunneling, sniffing packets, modifying or adding software components, using a data mining
                        utility program to intercept, capture, read or mine information generated by the Services or use in
                        some manner a system now known or hereafter established that would allow unauthorized access or use
                        of the Resources to be made accessible or otherwise made available.</li>
                    <li class="ml-5">Utilizing macros, auto-looting, robot play, or any other actions that allow
                        you to automatically run or execute any action in a game with or without your participation (or any
                        character you are controlling).</li>
                    <li class="ml-5">Creating or otherwise exceeding your permitted access to any component of the
                        Services or any website, computer, or system by more than one account within twenty-four hours or
                        more than five accounts within thirty days.</li>
                    <li class="ml-5">Generating or otherwise exceeding your permitted access to any component of
                        the Services or any website, computer, or system by more than one account within twenty-four hours
                        or more than five accounts within thirty days.</li>
                    <li class="ml-5">Participating in actions that in NapZone Games’ absolute discretion is
                        harmful, harassing, defamatory, offensive, pornographic, hateful, threatening, aggressive, divisive,
                        bullying, oppressive, aggressive or inciting abuse (including self-harm), stalking, sexually
                        explicit, or otherwise intolerable, including without limitation plundering, murdering, making
                        sexual remarks, or cursing.</li>
                    <li class="ml-5">Selling, promoting or uploading information for the Services on hackers,
                        confidential servers (including their sources), or gold farming.</li>
                    <li class="ml-5">Any in-game object created or replicated by manipulating a design error,
                        undocumented problem, or software bug is created, used, or transacted.</li>
                    <li class="ml-5">The publishing or sharing, in any manner whatsoever, of personal information
                        of other users or of any content, without the authorization to do so, of non-public business
                        information.</li>
                    <li class="ml-5">Taking part in any other activity that subjects us, any of our users, or any
                        other third party, in NapZone Games sole opinion, to any responsibility, harm, or detriment of any
                        sort. Violations of the protection of the device or network or attempts to interrupt or impede the
                        functionality of the services may result in civil or criminal liability. We may investigate and
                        cooperate with law enforcement agencies to prosecute users who violate the terms and conditions.
                    </li>
                </ul>
                <p class="text-white">WE MAY SUSPEND, CHANGE, OR CANCEL YOUR ACCESS TO THE SERVICES FOR ANY OR NO REASON
                    AT ANY TIME WITHOUT WARNING UNLESS EXPRESSLY PERMITTED BY APPLICABLE LAW. If your account is terminated
                    when you are competing in a tournament or competition, NapZone Games accepts no responsibility for the
                    loss of any possible prizes or acknowledgment relevant to the tournament or competition.</p>
                <p class="list-heading font-weight-bold">vi. Third-Party Amenities, Data, and Connections</p>
                <p class="text-white">Through third-party services, the Services can be made available to you and can
                    connect to or provide third-party services or content (including without limitation User Content posted
                    in forums). For such third-party resources or materials, we do not monitor, support, sponsor, recommend,
                    or otherwise take liability. These third parties can require you, prior to using the Services, to
                    install additional software, register for additional accounts, agree to additional terms and conditions,
                    or take other precautions. The use of any third-party services or material is at your own expense and
                    subject to the terms and conditions of that third party. In no conditions will NapZone Games be
                    responsible or liable in connection with the reliance on the use of resources or material by third
                    parties.</p>
                <p class="text-white">Your devices may connect to or use third-party networks while using our services,
                    and you may incur costs depending on your use of those networks. You are entirely liable for any and all
                    charges and expenses involved with accessing and using the Facilities, including, but not limited to,
                    Internet Service Provider Fees, Telephone Fees, SMS Fees, Excess Broadband Fees, and any and all of the
                    computers and appliances used in conjunction with the Services.</p>
                <p class="list-heading font-weight-bold">vii. Disclaimer of Contracts; Limits of Accountabilities</p>
                <p class="text-white">NapZone Games AND SERVICE PROVIDERS DO NOT REFLECT ON SUITABILITY, RELIABILITY,
                    TIMELINESS, ACCURACY, HEALTH, PERFORMANCE, OR INTEROPERABILITY OF INFORMATION, APPLICATIONS, GOODS,
                    SERVICES, AND ANY MATERIAL FOUND WITHIN THE SERVICES FOR ANY REASON. YOUR USE OF THE SERVICES. NapZone
                    Games AND ITS DEVELOPERS AND SERVICE PROVIDERS HEREBY WAIVE ALL GUARANTEES AND CONDITIONS AFFECTING THE
                    SERVICES, INCLUDING ALL IMPLICIT WARRANTIES AND CONDITIONS OF MERCHANTABILITY, FITNESS FOR SPECIFIC
                    INTENT, TITLE, AND NON-INFRINGEMENT. Other countries do not allow implied warranties to be omitted, so
                    you may not be entitled to some of the aforementioned exclusions.</p>
                <p class="text-white">YOU EXPRESSLY ACCEPT that in no case shall NapZone Games OR ITS MANAGERS,
                    ASSOCIATES, OWNERS, JOINT VENTURERS, THIRD-PARTY VENDORS, WORKERS, LICENCE HOLDERS, COPYRIGHT OWNERS,
                    ADVERTISERS, OR AGENTS be responsible for ANY FORMAL OR INFORMAL, EXCEPTIONAL, INCIDENTAL, CONSEQUENTIAL
                    OR PUNITIVE DAMAGES, LOSS OF INCOME OR OTHER DAMAGES WHATSOEVER RESULTING FROM THE USAGE OF THE
                    SERVICES, ANY DISRUPTION IN THE AVAILABILITY OF THE SERVICES, DELAY IN OPERATION OR TRANSMISSION,
                    COMPUTER VIRUS, LOSS OF DATA OR USE, MISUSE, DEPENDENCY, REVIEW, EXPLOITATION, OR ANY OTHER USE OF THE
                    SERVICES OR INFORMATION COLLECTED THROUGH THE SERVICES, EITHER ESTABLISHED ON AGREEMENT, TORT, FRAUD,
                    STRICT LIABILITY OR OTHERWISE, IN ANY WAY WHATSOEVER, EVEN THOUGH WE HAVE BEEN TOLD OF THE POSSIBILITY
                    OF SUCH HARM OR LOSS. SINCE SOME LAWS DO NOT PERMIT FOR THE EXCLUSION OR RESTRICTION OF RESPONSIBILITY
                    FOR CONSEQUENTIAL, ACCIDENTAL, OR OTHER TYPES OF IMPAIRMENTS, SOME OR ALL OF THE ABOVE RESTRICTIONS MAY
                    NOT APPLY TO YOU. IF YOU ARE NOT SATISFIED WITH ANY COMPONENT OF THE SERVICES OR WITH ANY OF THE TERMS
                    OF THE AGREEMENTS IN PLACE, YOUR ONLY AND EXCLUSIVE SOLUTION IS TO CANCEL THE USE OF THE SERVICES. THE
                    OVERALL COLLECTIVE RESPONSIBILITY OF NapZone Games FOR ALL DAMAGES, INJURIES, AND CAUSES OF ACTION,
                    WHETHER IN THE CASE OF A AGREEMENT, MISDEMEANOUR WHICH INCLUDES BUT IS NOT LIMITED TO NEGLIGENCE, STRICT
                    LIABILITY OR OTHERWISE, SHALL BE MORE THAN $100 OR THE AMOUNT PAID TO USE THE SERVICES, TO THE DEGREE,
                    ALLOWED BY APPLICABLE LAW.</p>
                <p class="list-heading font-weight-bold">viii. Compensation for harm or loss</p>
                <p class="text-white">You consent to compensate, protect and keep NapZone Games ALONG WITH OUR
                    LEGISLATURES, ADMINISTRATORS, INVESTORS, MEMBERS, JOINT VENTURERS, THIRD-PARTY VENDORS, STAFF,
                    LICENSEES, LICENSORS, ADVERTISERS, AND OFFICERS, safe against harm and against any and all losses,
                    costs, expenses (including fair attorneys' fees and expenses), lawsuits, penalties and obligations in
                    conjunction with or in connection with the harmful usage of our SERVICES and any violation to our Terms
                    by you. Hence, we reserve the right to conclude the complete protection of any allegation on which we
                    are entitled to compensation under these Terms. You shall, in such a circumstance, supply us with the
                    assistance we fairly seek.</p>
                <p class="list-heading font-weight-bold">ix. Principal Law</p>
                <p class="text-white">Without reference to the rules of conflict of law, you recognize that,
                    notwithstanding your place of origin, the application of the United Nations Agreement on Contracts for
                    The Selling of Products is expressly excluded. You accept, to the maximum capacity allowed by law, that
                    these Terms and Conditions shall be read in accordance with and entered into in compliance with
                    applicable laws of the country set out in the table below, on the basis of which the services in force
                    are made by the NapZone Games body. You agree to apply to the individual and exclusive jurisdiction of
                    the courts situated within the forum as specified unless otherwise given in Section X:</p>
                <p class="list-heading font-weight-bold">x. Disagreement Resolution</p>
                <p class="text-white">Residents of Japan, the European Union, or the European Economic Region are not
                    bound by this Section X. <br>
                    PLEASE READ THIS CLAUSE CAREFULLY BECAUSE IT CONCERNS YOUR RIGHTS. YOU FORFEIT
                    YOUR RIGHT TO LITIGATE CASES BEFORE A LAWSUIT AND TO MAKE A JUDGE OR JURY DETERMINE YOUR CASE BY
                    COMMITTING TO BINDING ARBITRATION.</p>
                <p class="text-white">NapZone Games and you all agree that any civil or equitable argument, conflict,
                    litigation, or proceeding arising from or relating to the Facilities ('Dispute') will be settled to the
                    fullest degree allowed by statute in order to expedite and regulate the expense of disputes:</p>
                <p class="text-white"><b>Announcement of Disagreement:</b> You or we must supply the other party with a
                    Notice of Dispute in the case of a dispute, which is a formal document setting forth the identity,
                    location, and contact information of the party giving it, the details giving rise to the conflict, and a
                    suggested remedy. You must mail and email any Notice of Conflict to us at the mailing addresses and
                    email addresses given in the Contact Us section. If we have it, we will give you any Note of Conflict by
                    post to your address or otherwise to your email address.</p>
                <p class="text-white"><b>Minor Entitlements Court:</b> If the case satisfies all the requirements to be
                    heard in small claims court, you may opt to litigate the dispute in small claims court (or the
                    equivalent) in the jurisdiction stated in Section IX.</p>
                <p class="text-white">Obligatory Settlement: In small claims cases, where the conflict is not settled,
                    all further attempts to settle the dispute will be carried out solely through binding arbitration, as
                    defined in this section. You give up the right to litigate all cases in court before a judge or jury (or
                    engage in them as a party or class member). Instead, all disputes will be decided before a neutral
                    arbitrator whose verdict will be binding, with the exception of the restricted right of appeal provided
                    for under the Federal Arbitration Act or some other relevant statute. The arbitrator's award will be
                    imposed by any court having authority over the parties.</p>
                <p class="text-white"><b>Exclusions to Settlement:</b> You and NapZone Games agree that the following
                    disputes are not subject to the rules pertaining to binding arbitration set out above:</p>
                <ul class="text-white">
                    <li class="ml-5">Any conflicts attempting to impose or defend, or pertaining to the value of,
                        any of your intellectual property rights or those of NapZone Games</li>
                    <li class="ml-5">Any injunctive relief claim.</li>
                    <li class="ml-5">Any allegation you are entitled to bring to the notice of any department of
                        federal, state, or local government that may allow such agencies to request redress from us on your
                        behalf if the law permits.</li>
                </ul>
                <p class="text-white"><b>Class Action Waiver:</b> Any action in any court to settle or litigate any
                    conflict would be carried out exclusively on an individual basis. Neither you nor we would try to get
                    any case heard as a class action or in any other proceeding in which any side acts in a legislative
                    capacity or intends to act. Until the prior written consent of all parties to all affected arbitrations
                    or prosecutions, no arbitration or proceeding shall be merged with another.</p>
                <p class="text-white"><b>Settlement Measures:</b> The Judicial Arbitration and Mediation Service
                    ('JAMS') shall perform such arbitration according to the relevant Customer or Commercial Arbitration
                    Laws in place at the time the case is filed. If JAMS is unable or unable to perform arbitration of the
                    conflict, all sides may voluntarily negotiate on an alternative arbitration service provider. By
                    following the JAMS rules, you can order a telephonic or in-person hearing. In a case costing $10,000 or
                    less, whether the arbitrator sees good reason to hold an in-person hearing instead, the hearing would be
                    telephonic. The arbitrator can personally award the same damages to you as a court would. The arbitrator
                    can grant relief only to you personally and only to the degree appropriate for your particular claim to
                    be fulfilled.</p>
                <p class="text-white"><b>Arbitrator’s Jurisdiction:</b> The arbitrator shall have the authority to
                    decide on the existence, extent, or legitimacy of the arbitration arrangement or the arbitrability of
                    any argument or counterclaim, including any objection to his or her own jurisdiction.</p>
                <p class="text-white"><b>Arbitration Fees:</b> The original arbitration fee is paid by whoever files the
                    arbitration. We pay if we file. When you apply, you pay unless, under the applicable arbitration rules,
                    you get a charge waiver. The other payments shall be allocated in compliance with the arbitration firm's
                    guidelines and relevant legislation. - A party shall pay the costs of the council, consultants, and
                    witnesses of that party and other expenditures, irrespective of which party prevails, except if the
                    arbitrator, following relevant law, so decides, a party may reclaim any or all expenses from another
                    party.</p>
                <p class="text-white"><b>Disagreements Must Be Filed Within One Year:</b> To the degree allowed by
                    statute, any dispute pursuant to this Arrangement must be filed in a small claims court or arbitration
                    proceeding within one year. The one-year cycle starts when it is practicable to file the Dispute or
                    Notice of Dispute first. If, after one year, a dispute is not filed, it is automatically barred.</p>
                <p class="text-white"><b>Provisional Injunctive Relief:</b> Any party can request temporary injunctive
                    relief in any court of appropriate jurisdiction prior to the appointment of an arbitrator without
                    waiving its right to arbitration.</p>
                <p class="text-white">If this arbitration arrangement is considered to be unconstitutional or
                    unenforceable, the parties agree to the fullest degree permissible under the relevant statute that, in
                    compliance with Section IX, any disagreement relating to your use of the Facilities or these Provisions
                    shall be instituted and heard.</p>
                <p class="list-heading font-weight-bold">xi. Miscellaneous</p>
                <p class="text-white"><b>All-inclusive Agreement:</b> These Terms represent a whole arrangement between
                    you and us, superseding all previous or contemporaneous (oral, literary, or electronic) correspondence
                    and suggestions between you and us.</p>
                <p class="text-white"><b>Relationship of Parties:</b> You accept that as a result of these conditions
                    or your access to and use of the facilities, no joint venture, collaboration, job, or organization
                    arrangement exists between you and us.</p>
                <p class="text-white"><b>Severability:</b> This clause shall be severed if any provision of these Terms
                    is considered to be unconstitutional or unenforceable. The majority of the terms and conditions will
                    remain in full power and effect. An enforceable provision that comes nearest to the purpose behind the
                    invalid provision will override the severed provision.</p>
                <p class="text-white"><b>Assignment:</b> Without the prior written permission of NapZone Games this
                    Arrangement will not be assigned, in whole or in part, whether knowingly, by statute, or otherwise, to
                    you. NapZone Games may, without constraint, assign, authorize, delegate, or otherwise move to any third
                    party its rights or obligations clause. Subject to the preceding sentences, the rights and liabilities
                    of the parties to this Agreement shall be binding on the parties and their respective successors and
                    authorized assigns and shall insure them to the benefit of them. Any attempted assignment other than
                    that referred to in this section shall be null and void.</p>
                <p class="text-white"><b>Captions and Headings:</b> The titles and headings of the sections and
                    paragraphs used in the Terms shall be inserted only for convenience and shall not affect the meaning or
                    interpretation of the Terms.</p>
                <p class="text-white">Waiver: Our failure to uphold or respond to any violation of any of the
                    provisions of these Terms by any party does not waive our right to subsequently enforce any of the terms
                    or conditions of the Terms or to react to any violations.</p>
                <p class="list-heading font-weight-bold">xii. Contact Us</p>
                <p class="text-white"><br>If you have any concerns about these terms and conditions, please email us at
                    <b>contact@napzone.games</b>
                </p>
            </div>
        </div>
    </section>
    <!-- ------------------------- Top Action And Top Multiplayer End ---------------------- -->
@endsection
