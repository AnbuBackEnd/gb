<!DOCTYPE html>
<html lang="en">
<style>
  body
  {
    font-size: 15px;
  }
            /** Define the margins of your page **/
            @page {
                margin-left:70px;
                margin-right:70px;
                margin-top:90px;
                margin-bottom:70px;
               
            }

            header {
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;
                font-size: 20px !important;

                /** Extra personal styles **/
              
                color: white;
                text-align: center;
                line-height: 35px;
            }

            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px; 
                font-size: 20px !important;

                /** Extra personal styles **/
                background-color: #008B8B;
                color: white;
                text-align: center;
                line-height: 35px;
            }
    
p {
  text-align: justify;
  text-justify: inter-word;
}
  </style>
<body>
  <header>
<center><img src="{{ public_path('greenbound.jpg') }}" width="200px" height="45px"> </center></header>
  <center><h5>CRYPTOCURRENCY TRADE&PAYMENT AGREEMENT</h5>
  <?php if($investmentrecords != false)
  {
    foreach($investmentrecords as $row)
    {
        $tenureperiod=$row['tenure'];
        $interestrate=$row['interestrate'];
        $maturitydate=date('d-m-Y',strtotime($row['maturitydate']));
        $invest_date=date('d-m-Y',strtotime($row['invest_date']));
    }
  }
  ?>
  <?php if($clients != false)
  {
    foreach($clients as $row)
    {
        $clientaddress=$row['client_address'];
        $client_name=$row['client_name'];
    }
  }
  ?>
   <?php if($settings != false)
  {
    foreach($settings as $row)
    {
        $directorname=$row['directorname'];

    }
  }
  ?>
  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;THIS CRYPTOCURRENCY PAYMENT AGREEMENT (the “Agreement”) is made as of Greenbound
Strategy solutions 590 Almeda west  street, Block  No  406,California,United  States,  and  the  persons  named
on Schedule           I attached hereto (the“<?php echo $tenureperiod; ?> Months”) (each, a <?php echo $clientaddress; ?> and collectively, the “Named
Lenders”). Capitalized terms not otherwise defined in this Agreement shall have the meanings ascribed to them in
that certain  Note  Purchase  Agreement  by  and  among  the  Company,  the  Named  Lenders,  and  the  other  Lenders
identified therein, dated as of <?php echo $invest_date; ?>  (the “Trade Agreement”).</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHEREAS, the Note Purchase Agreement provides that, if the Company elects to accept Consideration in
the form of Cryptocurrency, the principal shall be expressed in US dollars (“USD”) and valued in accordance with
this Agreement; and</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHEREAS, each Named Lender intends to provide the Consideration to the Company in the form of
Cryptocurrency as set forth opposite the name of such Named Lender on the Schedule.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOW, THEREFORE, the parties hereby agree as follows:</p>    
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. <u>Transfer of Cryptocurrency</u>   .  If  the  Company  elects  to  accept  Consideration  in  the  form  of
Cryptocurrency and Fiat Money, as of the applicable Initial Closing or Subsequent Closing (as the case may be),
each Named Lender hereby assigns and transfers unto the Company all of such Named Lender’s right, title and
interest of every kind, nature and description in the Consideration in the form of Cryptocurrency owned by such
Named Lender.</p>    
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. <u>Additional          Closing          Mechanics   .</u>  The  payment  procedures,  exchange  rate  methodology  and  other
provisions set forth below shall apply to each Named Lender, severally and not jointly.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.1 <u>Timing of Payment; Company Wallet</u>   . Unless agreed otherwise with the Company, payment
shall be made by each Named Lender’s delivery of Cryptocurrency to the Company’s Wallet at or before 5:00 p.m.
(eastern time) on the date of the Initial Closing or Subsequent Closing, as the case may be (in each case free and
clear of liens and other encumbrances). The Company’s “Wallet” means the location, wallet, address, account or
storage device designated by the Company in a written notice given to each Named Lender as the location to which
Cryptocurrency to be delivered to the Company pursuant hereto should be sent.</p> 
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.2 <u>Exchange Rate </u>  . The USD value of Consideration in the form of Cryptocurrency to which a
Named Lender will be entitled under the Agreement will be determined as follows, or as otherwise agreed with the
Company. Consideration received by the Company shall be converted into USD based upon the daily exchange rate
for such Cryptocurrency to provide the USD equivalent Consideration. The daily exchange rate shall be the last
traded price for such Cryptocurrency to USD exchange transaction, as reflected on Major Exchanges closest to
5:00:00, meaning the last trade closest to and including 5:00:00p.m. (ET) (but not after 5:00:00) on the date of the
Initial Closing or Subsequent Closing, as applicable</p>    
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.3 <u>Acceptance by the Company  </u> ; Completion of Transaction. Each Named Lender acknowledges
that transfer and payment of Consideration in the form of Cryptocurrency is only complete once the Cryptocurrency
has been successfully delivered to the Company’s Wallet and the Company has accepted the Cryptocurrency as
Consideration as of the Initial Closing or Subsequent Closing. Upon acceptance, and once the USD equivalent
Consideration is determined, the Company will provide the applicable Named Lender with a confirmation email,
which substantiates the Consideration in the form of Cryptocurrency</p>  <br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.4	<u>Effect of Transfer.</u> Each Named Lender further acknowledges that, once such Named Lender transfers the Cryptocurrency and the applicable Initial Closing or Subsequent Closing occurs, the Company acquires the entire economic interest in the Cryptocurrency and the Cryptocurrency is exclusively owned and controlled by the Company.</p>    

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.5	<u>Additional Information and Documentation.</u> Upon request by the Company, the Named Lender may be required to provide additional information and documentation regarding the Cryptocurrency to the Company or its designated service provider, including but not limited to the purchase source and date and time of acquisition.</p>    
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.6	<u>Non-Acceptance by the Company.</u> Should the Company determine, in its sole discretion, that it is unable to accept Consideration in the form of Cryptocurrency, each Named Lender acknowledges that the Company will return the amount of Cryptocurrency contributed by such Named Lender to such Named Lender’s wallet, if the Company has not yet converted the Cryptocurrency to USD. If the Company determines, in its sole discretion, that it cannot accept the Consideration in the form of Cryptocurrency after the Company has converted the Cryptocurrency to USD, the Company will use the proceeds of the conversion to buy Cryptocurrency with the USD proceeds from the sale of the contributed Cryptocurrency. In any such instance, the returned Cryptocurrency may not be the exact amount of Cryptocurrency that the Named Lender originally contributed
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.	<u>Representations and Warranties of each Named Lender.</u> In connection with the transactions provided for herein, each Named Lender hereby represents and warrants to the Company, severally and not jointly, as of the date of the applicable Initial Closing or Subsequent Closing (as the case may be) that:
</p>    
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.1	<u>Authorisation.</u> Each Named Lender agrees that any Consideration in the form of Cryptocurrency, once accepted by the Company, represents an irrevocable payment to the Company and is not refundable to the Named Lender (except in the event that the Company determines, in its sole discretion, that it cannot accept the Consideration in the form of Cryptocurrency).</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.2	<u>Volatility of Cryptocurrency.</u> Each Named Lender acknowledges that the Cryptocurrency may be volatile, and that the Cryptocurrency received by the Company and/or the funding amount (or the amount of Cryptocurrency returned to the Named Lender in the event that the Company determines, in its sole discretion, that it cannot accept the Consideration in the form of Cryptocurrency after it has been converted into USD) may be different (higher or lower) from the fair market value or other measure of the value of the Cryptocurrency at the time of the payment to the Company.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.3	<u>Ownership of Cryptocurrency.</u> Each Named Lender has, or will have, at the time of (and immediately prior to) the applicable Initial Closing or Subsequent Closing (as the case may be), (i) the right to assign such Cryptocurrency, (ii) sole legal ownership of such Cryptocurrency, free and clear of all liens, and (iii) sole legal ownership of all applicable funding asset addresses and custodial accounts.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.4	<u>No Unlawful Sources.</u> Each Named Lender agrees that, to the best of his or her knowledge, such Named Lender’s Consideration in the form of Cryptocurrency is not derived from unlawful sources or activities. Each Named Lender acknowledges that, due to anti-money laundering requirements, the Company may require additional documentation before the Company accepts Consideration in the form of Cryptocurrency. Please be aware that a Named Lender’s failure to provide or a delay in providing any such documentation may delay acceptance by the Company or cause such Named Lender’s Consideration in the form of Cryptocurrency to be rejected entirely.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.5	<u>Certain AML Compliance Obligations.</u> None of such Named Lender or, to the knowledge of such Named Lender, any director, officer, employee, agent, or affiliate of such Named Lender, is an individual or entity (“person”) that is, or is owned or controlled by persons that are: (i) the subject of any sanctions administered or enforced by the U.S. Department of the Treasury’s Office of Foreign Assets, the U.S. Department of State, the United Nations Security Council, the European Union, Her Majesty’s Treasury, or other relevant sanctions authority (collectively, “Sanctions”), or (ii) located, organized or resident in a country or territory that is, or whose government is, the subject of Sanctions. Each Named Lender (and, if such Named Lender is an entity, its directors,officers and employees) and, to the knowledge of such Named Lender, the agents of such Named Lender, are in compliance with all applicable Sanctions and with the Foreign Corrupt Practices Act of 1977 and the rules and regulations thereunder (the “FCPA”) and any other applicable anti-corruption law.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.6	<u>No Tax Advice.</u> Such Named Lender has not relied on the Company or any director, officer, employee, agent, or affiliate of the Company for any tax or accounting advice concerning this Agreement, the Note Purchase Agreement, or the Note, and has made its own determination as to the tax and accounting treatment of the transactions contemplated hereby and thereby. The Company does not provide legal or tax advice.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>4.	Miscellaneous.</u>  </p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.1	<u>Further Assurances.</u> In connection with this Agreement, and all transactions contemplated by this Agreement, each Named Lender agrees to execute and deliver such additional documents and instruments and to perform additional acts as may be necessary and appropriate to effectuate, carry out and perform the terms of this Agreement and such transactions.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.2<u>	Indemnification.</u> Each Named Lender, severally and not jointly, agrees to indemnify and hold harmless the Company and its affiliates, and the officers, directors, employees, and agents of any of the foregoing (together, the “Indemnified Persons”), from and against any and all loss, damage, liability or expense, including reasonable costs and attorneys’ fees and disbursements, which an Indemnified Person may incur by reason of, or in connection with, any representation or warranty made in this Agreement not having been true, correct and complete when made or any misrepresentation made by such Named Lender or any failure by such Named Lender to fulfill any of the covenants or agreements set forth in this Agreement or in any other document provided by the Named Lender to the Company.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.3	<u>Incorporation by Reference.</u> Each party acknowledges and agrees that the provisions of Section 6 (Miscellaneous) of the Note Purchase Agreement are incorporated into this Agreement by reference, mutatis mutandis, except that Sections 6.1 (Successors and Assigns) and 6.9 (Amendments and Waivers) of the Note Purchase Agreement shall not be incorporated by reference.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.4	<u>Successors and Assigns.</u> Except as otherwise provided herein, the terms of this Agreement shall inure to the benefit of and be binding upon the respective successors and assigns of the parties.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.5	<u>Amendments and Waivers.</u> Any term of this Agreement may be amended and the observance of any term of this Agreement may be waived (either generally or in a particular instance and either retroactively or prospectively), with the written consent of the Company and the holders of a majority in interest of the aggregate principal amount of the Notes then outstanding and held by the Named Lenders (the “Majority Named Lenders”). Each Named Lender acknowledges that, by the operation of this Section 4.5, the Majority Named Lenders have the right and power to diminish or eliminate all rights of such Named Lender under this Agreement</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.6	<u>Severability.</u> If one or more provisions of this Agreement are held to be unenforceable under applicable law, such provision shall be excluded from this Agreement and the balance of this Agreement shall be interpreted as if such provision were so excluded and shall be enforceable in accordance with its terms.</p>
<p><b>Confidential information:</b> means any technical and commercial information, regardless of its form and how it is furnished, relating to the respective business(es) of a Party, its subsidiaries and/or affiliated companies save from information which (a) is or becomes generally available to the public other than as a result of a breach of this Agreement, (b) already in the possession of a Party without restriction prior to any disclosure hereunder, (c) or has been disclosed to a Party by someone who is</p>
<p>free contractually and lawfully to disclose the same without confidentiality restrictions, or which is (d) independently developed by a Party or its subsidiaries or affiliated companies, and no Confidential information has been used directly or indirectly in such development.
<p><b>Confirmation of Acceptance:</b> Electronic Information returned to a requesting Party constituting the binding acceptance of an order or any other business request.</p>
<p><b>Confirmation of Receipt:</b> Electronic Information returned to a requesting Party to confirm the proper receipt of Electronic Information.</p>
<p><b>Electronic Information:</b> Includes, but is not limited to, messages, documents and data using technologies like electronic data interchange, electronic mail, and internet-based transactions making use of extensible markup language and portal technology.</p>
<p><b>Electronic Information Exchange:</b> Means of Transactions through the exchange of Electronic Information.</p>
<p><b>Electronic Signature:</b> An Electronic Signature means data in electronic format which are attached to or logically associated with other electronic data and which serve as a method of authentication.</p>
<p><b>Encryption:</b> Encryption is the conversion of data by means of mathematical algorithms into a form (secret code) that cannot be easily understood by unauthorized people.</p>
<p><b>Information:</b> Information means data, text, images, sounds, codes, computer programs, software, databases, or the like.</p>
<p><b>Record:</b> Record means Information that is inscribed on a tangible medium or that is stored in an electronic or other medium and is retrievable in perceivable form.</p>
<p><b>Service:</b> A Service is a software module deployed on network accessible platforms provided by the Service Provider. Its interface is described by a Service description. It exists to be invoked by or to interact with a Service requestor. It may also function as a requestor, using other Services in its implementation.</p>
<p><b>Service Provider:</b> A company that provides to its Trading Partner Electronic Information Exchange Services that would otherwise have to be located in their own company computers. The Service Provider is the owner of the Services offered.</p>
<p><b>Signatory:</b> means a person who holds a signature-creation device and acts either on his own behalf or on behalf of the natural or legal person or entity he represents.</p>
<p><b>Specifications:</b> The set of standards, protocols and documents describing business and technical procedures and rules and other requirements applicable to the Electronic Information Exchange agreed, using the Adopted Format identified in the Appendices to this Agreement.</p>
<p><b>Trading Partner:</b> A company using Electronic Information Exchanges under this Agreement.</p>
<p><b>Transaction:</b> A Transaction means an action or set of actions relating to the conduct of business, consumer, or commercial affairs between two or more Trading Partners, including any of the following types of conduct: (a) the sale, lease, exchange, licensing, or other disposition of (i) personal property, including goods and intangibles, (ii) Services, and (iii) any combination thereof; and (b) the sale, lease, exchange, or other disposition of any interest in real property, or any combination thereof.</p>
<p><b>4.	Object and Scope</b></p>
<p>These provisions shall govern the terms and conditions of the Agreement between the Parties in respect to the exchange and processing of Information by electronically transmitting and receiving data with the Adopted Format.
Because the Parties hereby agree to use Electronic Information Exchange as a substitution for conventional paper- based documents, this Agreement is to ensure that such Transactions are not legally invalid or unenforceable as a result of the use of the Adopted Format for the mutual benefit of the Parties.
The Parties agree that any portion of this Agreement which aims to determine contract formation does not create any agency, partnership, joint venture relationship or other business relationship between the Parties.
  </p>
  <p><b>5.	General Terms and Conditions</b></p>
  <p>Commercial terms and conditions, such as prices, volumes, rebates and discounts, payment terms and credit arrangements, i.e. other than the terms and conditions of this Agreement, governing Transactions under this agreement are to be agreed between the Parties and will apply in addition to this Agreement. The terms and conditions of this Agreement will prevail in the event of a conflict relating to issues dealt with in this Agreement.
No Party may transfer this Agreement to another party without the consent of the other Party to this Agreement. Consent cannot be withheld unless there are reasonable, justifiable grounds thereto.
</p>
<p><b>6.	Legal Compliance</b></p>
<p>Each Party shall, as a minimum requirement, comply with all relevant local and national laws or regulations, and in particular, but not limited to provisions concerning data transmission, data protection and data storage. Any personal data a Party may have access to in the course of the business relationship shall be maintained and used exclusively for the intended purpose.
Each Party represents and warrants that (a) it has obtained all necessary approvals, consents, and authorisations of third parties and governmental authorities to enter into this Agreement and to perform and carry out its obligations hereunder; (b) the persons executing this Agreement on its behalf have express authority to do so, and in so doing, to bind the Party thereto; and (c) this Agreement is a valid and binding obligation of such Party, enforceable in accordance with its terms.
Except as expressly stated above or otherwise specifically agreed neither Party makes any representation or warranties and each Party hereby expressly disclaims all representations and warranties express or implied related to this Agreement.

 </p>
 <p><b>7.	Confidentiality and Third Party</b></p>
 <p>Unless otherwise specifically agreed, all Electronic Information transmitted hereunder, and the Electronic Signatures used as security measures for Electronic Information Exchanges, shall be deemed as confidential information and the property of the originating Party. The Parties agree that Confidential Information shall only be used for the purpose of this Agreement. A Party may, however, regardless of the above, disclose Confidential information pursuant to an order of court, by compulsion of law or to any of its respective professional advisors, auditors or its own officers and to companies within the same group as the Party is belonging to, who need to know, subject to the disclosing Party procuring an appropriate non-disclosure obligation from the relevant person, whether natural or legal subject to the Party disclosing Confidential Information notifying the other Party without undue delay.
Electronic Information may be exchanged either directly or through a Service Provider with whom either Party may contract. The Party contracting with a Service Provider must procure an appropriate non-disclosure obligation from the relevant Service Provider and require that the Service Provider use confidential information disclosed to or learned by such Service Provider only in connection with providing agreed Services to the relevant Party.
</p>
<p><b>8.	Security</b></p>
<p>Each Party shall properly implement the security procedures and infrastructure detailed in the applicable Specifications and Appendices, or if security procedures are not specified, shall properly implement security procedures that are sufficient to ensure that all Information exchanges are authorized and secure and to protect the Information transmitted, its business Records, and data from improper access and use, alteration, false denial, destruction, or loss.<b>For all Electronic Information Exchanges requiring Encryption as specified in the applicable Specifications and Appendices, each Party shall encrypt the Information accordingly.</b></p>
<p><b>9.	Liability</b></p>
<p>No Party shall be liable for any failure to perform its obligations in connection with any Transaction or any Information exchanged, where such failure results from any act of nature or other cause beyond such Party's or its Service Provider’s reasonable control, including without limitation, any mechanical, electronic or communications failure, which prevents such Party or its Service Provider from electronically transmitting or receiving any Electronic Information.
Neither Party shall be liable to the other for any indirect, special, incidental, exemplary or consequential damages arising from or as a result of any delay, omission or error in the electronic transmission or receipt of any Electronic Information pursuant to this Agreement, even if the Party has been advised of the possibility of such damages.
Each Party shall be liable for direct damages originated by the acts or omissions of its Service Provider while transmitting, receiving, storing, or handling Electronic Information, or performing related activities for such Party. If both Parties use the same Service Provider to exchange the Electronic Information, the originating Party shall be liable for the acts or omissions of such Service Provider as to such exchanged Information.
Each Party shall be responsible for the costs of any Service Provider with which it contracts, unless otherwise specified in an Appendix.

</p>
<p><b>10.	Applicable Law – Dispute resolution</b></p>
<p>This Agreement shall be construed and interpreted in accordance with the laws of United States, United kingdom, Singapore, India   ), without prejudice to any mandatory legislative provision, which may apply to the Parties with regard to processing, recording and storage of Electronic Information, or confidentiality and protection of personal data. All disputes arising out of this Agreement or its validity and which cannot be settled amicably, shall be submitted to the ordinary court of	, unless both Parties specifically agree on arbitration or alternative dispute resolution elsewhere. Arbitration or alternative dispute resolution shall be conducted in the English language.
 
 </p>
 <p><b>11.	Termination</b></p>
 <p>This Agreement shall remain in effect until terminated by either Party with not less than 30 days prior written notice, which notice shall specify the effective date of termination; provided, however, that any termination shall not affect the respective obligations or rights of the Parties arising under any exchanged Information or otherwise under this Agreement and any other agreement signed between the Parties prior to the effective date of termination. Those provisions that by their nature are continuing obligations shall survive any termination and remain binding upon the Parties.</p>
 <p><b>12.	Sever-ability</b></p>
 <p>Any provisions of this Agreement, which are determined to be invalid or unenforceable, will be ineffective to the limited extent of such determination without invalidating the remaining provisions of this Agreement or affecting the validity or enforceability of such remaining provisions.</p>
 <p><b>13.	Entire Agreement</b></p>
 <p>This Agreement between both parties between <?php echo $client_name; ?> and Greenbound Strategy Solutions Private Ltd
Effective date <?php echo $invest_date; ?>; Based on <?php echo $tenureperiod; ?> Months return of <?php echo $interestrate; ?>% every month. Will return back to the Client principle amount based on the Client effective Closing date <?php echo $maturitydate; ?> constitute the Entire Agreement of the Parties relating to the matters specified in this Agreement and supersede all prior representations or agreements, whether oral or written, with respect to such matters.
</p>
<p>Should an inconsistency occur between the provision of this Agreement and the Appendices, the provisions of the Agreement shall prevail.</p>
<p>No modification or waiver of any of the provisions of this Agreement and/or any of its Appendices shall be binding on either Party unless made in a paper-based writing and signed by an authorised representative of each Party. No obligation to enter into any Transaction or any further contractual relationship is to be implied from the execution or delivery of this Agreement.</p>
<p>The Entire Agreement may be translated into other languages, but the English language version will be the official version and will control the construction and interpretation hereof.
IN WITNESS WHEREOF, the Parties hereto execute this Agreement anywhere in the world will be acceptable only for trade purpose .
</p><br>
<p><b>Greenbound Strategy Solutions</b></p>
<p>Signature:_______________________</p>
<p>Typed Name:<?php echo $directorname; ?></p>
<p>Title : Director</p>
<p>Date/Place : _____________________</p>
<p style="margin-left:370px;">_____________________(Client Signature)</p>
<p style="float:right;">Signature__________________________(Witness)</p><br><br><br>
<center>Each Party shall comply with all local and international regulations related to the import, export and use of cryptographic products
(signature page follows)
 
</center>

</body>

</html>
