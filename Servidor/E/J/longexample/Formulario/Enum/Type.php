<?php

namespace Enum;

enum Type : string {
    case TEXT = "text";
    case NUMBER = "number";
    case PASSWORD = "password";
    case CHECKBOX = "checkbox";
    case RADIO = "radio";
    case DATE = "date";
    case MAIL = "mail";
    case SELECT = "select";
    case TEXTAREA = "textarea";

}