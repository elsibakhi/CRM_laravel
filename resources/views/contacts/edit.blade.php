<x-main-layout path="../../dashbord/">
      
<x-contact-form  name="edit" :action="route('contacts.update',$contact->id)" :contact="$contact"/>

</x-main-layout>