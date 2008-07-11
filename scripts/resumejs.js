/***************************
copyright (2007) Matthew Hooker
mwhooker@gmail.com
****************************/

function DescState() {
  var m_hide = new CollapseState(this);
  var m_expand = new ExpandState(this);
  var m_state = m_expand;

  function getName() {
    return m_state.getActionValue();
  }
  function doAction() {
    m_state.doAction();
  }
  function setState(state) {
    m_state = state;
    //$('dispall').text = m_state.ActionValue;
  }
  function getExpandState() {
    return m_expand;
  }
  function getCollapseState() {
    return m_hide;
  }
  this.getName = getName;
  this.doAction = doAction;
  this.setState = setState;
  this.getExpandState = getExpandState;
  this.getCollapseState = getCollapseState;
}

function ExpandState(machine) {
  var m_machine = machine;
  var ActionValue = "Expand All";

  function getActionValue() {
    return ActionValue;
  }

  function doAction() {
    //exp = $('experience').getElementsByClassName('role');
    var exp = $('experience').getElementsBySelector('[class="role"]');
    len = exp.length;
    for (i = 0; i<len; ++i) {
      //alert(exp[keyVar]);
      ExpandOne(exp[i]);
    }
    m_machine.setState(m_machine.getCollapseState());
  }
  this.doAction = doAction;
  this.getActionValue = getActionValue;
}


function ExpandOne(node) {
  var elem = node.getElementsByClassName('roledesc')[0];
  elem.addClassName('roledescdisp');
  node.getElementsByClassName('more')[0].hide();//.style.display='none';
  new Effect.BlindDown(elem); 
  return false;
}



function CollapseState(machine) {
  var m_machine = machine;
  var ActionValue = "Collapse All";

  function getActionValue() {
    return ActionValue;
  }

  function doAction() {
    exp = $('experience').getElementsBySelector('[class="role"]');
    len = exp.length;
    for (i = 0; i<len ; ++i) {
      //alert(exp[keyVar]);
      CollapseOne(exp[i]);
    }
    m_machine.setState(m_machine.getExpandState());
  }
  this.doAction = doAction;
  this.getActionValue = getActionValue;
}


function CollapseOne(node) {
  var elem = node.getElementsByClassName('roledesc')[0];
  new Effect.BlindUp(elem); 
  //this needs to wait until BlindUp is completely done or else
  //it will allow the user to click more and perma hide the description
  setTimeout(function(){
    node.getElementsByTagName('a')[0].style.display='block'; 
    elem.removeClassName('roledescdisp');
  }, 500);
  return false;
}


