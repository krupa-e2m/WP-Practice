<?php

// Functions and constants

namespace {
    if(!function_exists('\\trigger_deprecation')){
        function trigger_deprecation(...$args) {
            return \fakerpress_thirdparty_trigger_deprecation(...func_get_args());
        }
    }

}
namespace Faker\Provider\pt_BR {
    if(!function_exists('\\Faker\\Provider\\pt_BR\\check_digit')){
        function check_digit(...$args) {
            return \FakerPress\ThirdParty\Faker\Provider\pt_BR\check_digit(...func_get_args());
        }
    }
}


namespace FakerPress\ThirdParty {

    use BrianHenryIE\Strauss\Types\AutoloadAliasInterface;

    /**
     * @see AutoloadAliasInterface
     *
     * @phpstan-type ClassAliasArray array{'type':'class',isabstract:bool,classname:string,namespace?:string,extends:string,implements:array<string>}
     * @phpstan-type InterfaceAliasArray array{'type':'interface',interfacename:string,namespace?:string,extends:array<string>}
     * @phpstan-type TraitAliasArray array{'type':'trait',traitname:string,namespace?:string,use:array<string>}
     * @phpstan-type AutoloadAliasArray array<string,ClassAliasArray|InterfaceAliasArray|TraitAliasArray>
     */
    class AliasAutoloader
    {
        private string $includeFilePath;

        /**
         * @var AutoloadAliasArray
         */
        private array $autoloadAliases = array (
  'Cake\\Chronos\\Chronos' => 
  array (
    'type' => 'class',
    'classname' => 'Chronos',
    'isabstract' => false,
    'namespace' => 'Cake\\Chronos',
    'extends' => 'FakerPress\\ThirdParty\\Cake\\Chronos\\Chronos',
    'implements' => 
    array (
      0 => 'Stringable',
    ),
  ),
  'Cake\\Chronos\\ChronosDate' => 
  array (
    'type' => 'class',
    'classname' => 'ChronosDate',
    'isabstract' => false,
    'namespace' => 'Cake\\Chronos',
    'extends' => 'FakerPress\\ThirdParty\\Cake\\Chronos\\ChronosDate',
    'implements' => 
    array (
      0 => 'Stringable',
    ),
  ),
  'Cake\\Chronos\\ChronosDatePeriod' => 
  array (
    'type' => 'class',
    'classname' => 'ChronosDatePeriod',
    'isabstract' => false,
    'namespace' => 'Cake\\Chronos',
    'extends' => 'FakerPress\\ThirdParty\\Cake\\Chronos\\ChronosDatePeriod',
    'implements' => 
    array (
      0 => 'Iterator',
    ),
  ),
  'Cake\\Chronos\\ChronosPeriod' => 
  array (
    'type' => 'class',
    'classname' => 'ChronosPeriod',
    'isabstract' => false,
    'namespace' => 'Cake\\Chronos',
    'extends' => 'FakerPress\\ThirdParty\\Cake\\Chronos\\ChronosPeriod',
    'implements' => 
    array (
      0 => 'Iterator',
    ),
  ),
  'Cake\\Chronos\\ChronosTime' => 
  array (
    'type' => 'class',
    'classname' => 'ChronosTime',
    'isabstract' => false,
    'namespace' => 'Cake\\Chronos',
    'extends' => 'FakerPress\\ThirdParty\\Cake\\Chronos\\ChronosTime',
    'implements' => 
    array (
      0 => 'Stringable',
    ),
  ),
  'Cake\\Chronos\\ClockFactory' => 
  array (
    'type' => 'class',
    'classname' => 'ClockFactory',
    'isabstract' => false,
    'namespace' => 'Cake\\Chronos',
    'extends' => 'FakerPress\\ThirdParty\\Cake\\Chronos\\ClockFactory',
    'implements' => 
    array (
      0 => 'Psr\\Clock\\ClockInterface',
    ),
  ),
  'Cake\\Chronos\\DifferenceFormatter' => 
  array (
    'type' => 'class',
    'classname' => 'DifferenceFormatter',
    'isabstract' => false,
    'namespace' => 'Cake\\Chronos',
    'extends' => 'FakerPress\\ThirdParty\\Cake\\Chronos\\DifferenceFormatter',
    'implements' => 
    array (
      0 => 'Cake\\Chronos\\DifferenceFormatterInterface',
    ),
  ),
  'Cake\\Chronos\\Translator' => 
  array (
    'type' => 'class',
    'classname' => 'Translator',
    'isabstract' => false,
    'namespace' => 'Cake\\Chronos',
    'extends' => 'FakerPress\\ThirdParty\\Cake\\Chronos\\Translator',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Calculator\\Ean' => 
  array (
    'type' => 'class',
    'classname' => 'Ean',
    'isabstract' => false,
    'namespace' => 'Faker\\Calculator',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Calculator\\Ean',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Calculator\\Iban' => 
  array (
    'type' => 'class',
    'classname' => 'Iban',
    'isabstract' => false,
    'namespace' => 'Faker\\Calculator',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Calculator\\Iban',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Calculator\\Inn' => 
  array (
    'type' => 'class',
    'classname' => 'Inn',
    'isabstract' => false,
    'namespace' => 'Faker\\Calculator',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Calculator\\Inn',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Calculator\\Isbn' => 
  array (
    'type' => 'class',
    'classname' => 'Isbn',
    'isabstract' => false,
    'namespace' => 'Faker\\Calculator',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Calculator\\Isbn',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Calculator\\Luhn' => 
  array (
    'type' => 'class',
    'classname' => 'Luhn',
    'isabstract' => false,
    'namespace' => 'Faker\\Calculator',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Calculator\\Luhn',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Calculator\\TCNo' => 
  array (
    'type' => 'class',
    'classname' => 'TCNo',
    'isabstract' => false,
    'namespace' => 'Faker\\Calculator',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Calculator\\TCNo',
    'implements' => 
    array (
    ),
  ),
  'Faker\\ChanceGenerator' => 
  array (
    'type' => 'class',
    'classname' => 'ChanceGenerator',
    'isabstract' => false,
    'namespace' => 'Faker',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\ChanceGenerator',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Container\\Container' => 
  array (
    'type' => 'class',
    'classname' => 'Container',
    'isabstract' => false,
    'namespace' => 'Faker\\Container',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Container\\Container',
    'implements' => 
    array (
      0 => 'Faker\\Container\\ContainerInterface',
    ),
  ),
  'Faker\\Container\\ContainerBuilder' => 
  array (
    'type' => 'class',
    'classname' => 'ContainerBuilder',
    'isabstract' => false,
    'namespace' => 'Faker\\Container',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Container\\ContainerBuilder',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Container\\ContainerException' => 
  array (
    'type' => 'class',
    'classname' => 'ContainerException',
    'isabstract' => false,
    'namespace' => 'Faker\\Container',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Container\\ContainerException',
    'implements' => 
    array (
      0 => 'Psr\\Container\\ContainerExceptionInterface',
    ),
  ),
  'Faker\\Container\\NotInContainerException' => 
  array (
    'type' => 'class',
    'classname' => 'NotInContainerException',
    'isabstract' => false,
    'namespace' => 'Faker\\Container',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Container\\NotInContainerException',
    'implements' => 
    array (
      0 => 'Psr\\Container\\NotFoundExceptionInterface',
    ),
  ),
  'Faker\\Core\\Barcode' => 
  array (
    'type' => 'class',
    'classname' => 'Barcode',
    'isabstract' => false,
    'namespace' => 'Faker\\Core',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Core\\Barcode',
    'implements' => 
    array (
      0 => 'Faker\\Extension\\BarcodeExtension',
    ),
  ),
  'Faker\\Core\\Blood' => 
  array (
    'type' => 'class',
    'classname' => 'Blood',
    'isabstract' => false,
    'namespace' => 'Faker\\Core',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Core\\Blood',
    'implements' => 
    array (
      0 => 'Faker\\Extension\\BloodExtension',
    ),
  ),
  'Faker\\Core\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Core',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Core\\Color',
    'implements' => 
    array (
      0 => 'Faker\\Extension\\ColorExtension',
    ),
  ),
  'Faker\\Core\\Coordinates' => 
  array (
    'type' => 'class',
    'classname' => 'Coordinates',
    'isabstract' => false,
    'namespace' => 'Faker\\Core',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Core\\Coordinates',
    'implements' => 
    array (
      0 => 'Faker\\Extension\\Extension',
    ),
  ),
  'Faker\\Core\\DateTime' => 
  array (
    'type' => 'class',
    'classname' => 'DateTime',
    'isabstract' => false,
    'namespace' => 'Faker\\Core',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Core\\DateTime',
    'implements' => 
    array (
      0 => 'Faker\\Extension\\DateTimeExtension',
      1 => 'Faker\\Extension\\GeneratorAwareExtension',
    ),
  ),
  'Faker\\Core\\File' => 
  array (
    'type' => 'class',
    'classname' => 'File',
    'isabstract' => false,
    'namespace' => 'Faker\\Core',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Core\\File',
    'implements' => 
    array (
      0 => 'Faker\\Extension\\FileExtension',
    ),
  ),
  'Faker\\Core\\Number' => 
  array (
    'type' => 'class',
    'classname' => 'Number',
    'isabstract' => false,
    'namespace' => 'Faker\\Core',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Core\\Number',
    'implements' => 
    array (
      0 => 'Faker\\Extension\\NumberExtension',
    ),
  ),
  'Faker\\Core\\Uuid' => 
  array (
    'type' => 'class',
    'classname' => 'Uuid',
    'isabstract' => false,
    'namespace' => 'Faker\\Core',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Core\\Uuid',
    'implements' => 
    array (
      0 => 'Faker\\Extension\\UuidExtension',
    ),
  ),
  'Faker\\Core\\Version' => 
  array (
    'type' => 'class',
    'classname' => 'Version',
    'isabstract' => false,
    'namespace' => 'Faker\\Core',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Core\\Version',
    'implements' => 
    array (
      0 => 'Faker\\Extension\\VersionExtension',
    ),
  ),
  'Faker\\DefaultGenerator' => 
  array (
    'type' => 'class',
    'classname' => 'DefaultGenerator',
    'isabstract' => false,
    'namespace' => 'Faker',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\DefaultGenerator',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Documentor' => 
  array (
    'type' => 'class',
    'classname' => 'Documentor',
    'isabstract' => false,
    'namespace' => 'Faker',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Documentor',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Extension\\ExtensionNotFound' => 
  array (
    'type' => 'class',
    'classname' => 'ExtensionNotFound',
    'isabstract' => false,
    'namespace' => 'Faker\\Extension',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Extension\\ExtensionNotFound',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Extension\\Helper' => 
  array (
    'type' => 'class',
    'classname' => 'Helper',
    'isabstract' => false,
    'namespace' => 'Faker\\Extension',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Extension\\Helper',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Factory' => 
  array (
    'type' => 'class',
    'classname' => 'Factory',
    'isabstract' => false,
    'namespace' => 'Faker',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Factory',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Generator' => 
  array (
    'type' => 'class',
    'classname' => 'Generator',
    'isabstract' => false,
    'namespace' => 'Faker',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Generator',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Guesser\\Name' => 
  array (
    'type' => 'class',
    'classname' => 'Name',
    'isabstract' => false,
    'namespace' => 'Faker\\Guesser',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Guesser\\Name',
    'implements' => 
    array (
    ),
  ),
  'Faker\\ORM\\CakePHP\\ColumnTypeGuesser' => 
  array (
    'type' => 'class',
    'classname' => 'ColumnTypeGuesser',
    'isabstract' => false,
    'namespace' => 'Faker\\ORM\\CakePHP',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\ORM\\CakePHP\\ColumnTypeGuesser',
    'implements' => 
    array (
    ),
  ),
  'Faker\\ORM\\CakePHP\\EntityPopulator' => 
  array (
    'type' => 'class',
    'classname' => 'EntityPopulator',
    'isabstract' => false,
    'namespace' => 'Faker\\ORM\\CakePHP',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\ORM\\CakePHP\\EntityPopulator',
    'implements' => 
    array (
    ),
  ),
  'Faker\\ORM\\CakePHP\\Populator' => 
  array (
    'type' => 'class',
    'classname' => 'Populator',
    'isabstract' => false,
    'namespace' => 'Faker\\ORM\\CakePHP',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\ORM\\CakePHP\\Populator',
    'implements' => 
    array (
    ),
  ),
  'Faker\\ORM\\Doctrine\\ColumnTypeGuesser' => 
  array (
    'type' => 'class',
    'classname' => 'ColumnTypeGuesser',
    'isabstract' => false,
    'namespace' => 'Faker\\ORM\\Doctrine',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\ORM\\Doctrine\\ColumnTypeGuesser',
    'implements' => 
    array (
    ),
  ),
  'Faker\\ORM\\Doctrine\\EntityPopulator' => 
  array (
    'type' => 'class',
    'classname' => 'EntityPopulator',
    'isabstract' => false,
    'namespace' => 'Faker\\ORM\\Doctrine',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\ORM\\Doctrine\\EntityPopulator',
    'implements' => 
    array (
    ),
  ),
  'Faker\\ORM\\Doctrine\\Populator' => 
  array (
    'type' => 'class',
    'classname' => 'Populator',
    'isabstract' => false,
    'namespace' => 'Faker\\ORM\\Doctrine',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\ORM\\Doctrine\\Populator',
    'implements' => 
    array (
    ),
  ),
  'Faker\\ORM\\Mandango\\ColumnTypeGuesser' => 
  array (
    'type' => 'class',
    'classname' => 'ColumnTypeGuesser',
    'isabstract' => false,
    'namespace' => 'Faker\\ORM\\Mandango',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\ORM\\Mandango\\ColumnTypeGuesser',
    'implements' => 
    array (
    ),
  ),
  'Faker\\ORM\\Mandango\\EntityPopulator' => 
  array (
    'type' => 'class',
    'classname' => 'EntityPopulator',
    'isabstract' => false,
    'namespace' => 'Faker\\ORM\\Mandango',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\ORM\\Mandango\\EntityPopulator',
    'implements' => 
    array (
    ),
  ),
  'Faker\\ORM\\Mandango\\Populator' => 
  array (
    'type' => 'class',
    'classname' => 'Populator',
    'isabstract' => false,
    'namespace' => 'Faker\\ORM\\Mandango',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\ORM\\Mandango\\Populator',
    'implements' => 
    array (
    ),
  ),
  'Faker\\ORM\\Propel\\ColumnTypeGuesser' => 
  array (
    'type' => 'class',
    'classname' => 'ColumnTypeGuesser',
    'isabstract' => false,
    'namespace' => 'Faker\\ORM\\Propel',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\ORM\\Propel\\ColumnTypeGuesser',
    'implements' => 
    array (
    ),
  ),
  'Faker\\ORM\\Propel\\EntityPopulator' => 
  array (
    'type' => 'class',
    'classname' => 'EntityPopulator',
    'isabstract' => false,
    'namespace' => 'Faker\\ORM\\Propel',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\ORM\\Propel\\EntityPopulator',
    'implements' => 
    array (
    ),
  ),
  'Faker\\ORM\\Propel\\Populator' => 
  array (
    'type' => 'class',
    'classname' => 'Populator',
    'isabstract' => false,
    'namespace' => 'Faker\\ORM\\Propel',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\ORM\\Propel\\Populator',
    'implements' => 
    array (
    ),
  ),
  'Faker\\ORM\\Propel2\\ColumnTypeGuesser' => 
  array (
    'type' => 'class',
    'classname' => 'ColumnTypeGuesser',
    'isabstract' => false,
    'namespace' => 'Faker\\ORM\\Propel2',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\ORM\\Propel2\\ColumnTypeGuesser',
    'implements' => 
    array (
    ),
  ),
  'Faker\\ORM\\Propel2\\EntityPopulator' => 
  array (
    'type' => 'class',
    'classname' => 'EntityPopulator',
    'isabstract' => false,
    'namespace' => 'Faker\\ORM\\Propel2',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\ORM\\Propel2\\EntityPopulator',
    'implements' => 
    array (
    ),
  ),
  'Faker\\ORM\\Propel2\\Populator' => 
  array (
    'type' => 'class',
    'classname' => 'Populator',
    'isabstract' => false,
    'namespace' => 'Faker\\ORM\\Propel2',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\ORM\\Propel2\\Populator',
    'implements' => 
    array (
    ),
  ),
  'Faker\\ORM\\Spot\\ColumnTypeGuesser' => 
  array (
    'type' => 'class',
    'classname' => 'ColumnTypeGuesser',
    'isabstract' => false,
    'namespace' => 'Faker\\ORM\\Spot',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\ORM\\Spot\\ColumnTypeGuesser',
    'implements' => 
    array (
    ),
  ),
  'Faker\\ORM\\Spot\\EntityPopulator' => 
  array (
    'type' => 'class',
    'classname' => 'EntityPopulator',
    'isabstract' => false,
    'namespace' => 'Faker\\ORM\\Spot',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\ORM\\Spot\\EntityPopulator',
    'implements' => 
    array (
    ),
  ),
  'Faker\\ORM\\Spot\\Populator' => 
  array (
    'type' => 'class',
    'classname' => 'Populator',
    'isabstract' => false,
    'namespace' => 'Faker\\ORM\\Spot',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\ORM\\Spot\\Populator',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\Barcode' => 
  array (
    'type' => 'class',
    'classname' => 'Barcode',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\Barcode',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\Base' => 
  array (
    'type' => 'class',
    'classname' => 'Base',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\Base',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\Biased' => 
  array (
    'type' => 'class',
    'classname' => 'Biased',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\Biased',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\DateTime' => 
  array (
    'type' => 'class',
    'classname' => 'DateTime',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\DateTime',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\File' => 
  array (
    'type' => 'class',
    'classname' => 'File',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\File',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\HtmlLorem' => 
  array (
    'type' => 'class',
    'classname' => 'HtmlLorem',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\HtmlLorem',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\Image' => 
  array (
    'type' => 'class',
    'classname' => 'Image',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\Image',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\Lorem' => 
  array (
    'type' => 'class',
    'classname' => 'Lorem',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\Lorem',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\Medical' => 
  array (
    'type' => 'class',
    'classname' => 'Medical',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\Medical',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\Miscellaneous' => 
  array (
    'type' => 'class',
    'classname' => 'Miscellaneous',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\Miscellaneous',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => true,
    'namespace' => 'Faker\\Provider',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\UserAgent' => 
  array (
    'type' => 'class',
    'classname' => 'UserAgent',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\UserAgent',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\Uuid' => 
  array (
    'type' => 'class',
    'classname' => 'Uuid',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\Uuid',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ar_EG\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ar_EG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ar_EG\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ar_EG\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ar_EG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ar_EG\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ar_EG\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ar_EG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ar_EG\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ar_EG\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ar_EG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ar_EG\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ar_EG\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ar_EG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ar_EG\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ar_EG\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ar_EG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ar_EG\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ar_EG\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ar_EG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ar_EG\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ar_JO\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ar_JO',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ar_JO\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ar_JO\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ar_JO',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ar_JO\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ar_JO\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ar_JO',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ar_JO\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ar_JO\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ar_JO',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ar_JO\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ar_JO\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ar_JO',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ar_JO\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ar_SA\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ar_SA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ar_SA\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ar_SA\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ar_SA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ar_SA\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ar_SA\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ar_SA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ar_SA\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ar_SA\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ar_SA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ar_SA\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ar_SA\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ar_SA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ar_SA\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ar_SA\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ar_SA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ar_SA\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ar_SA\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ar_SA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ar_SA\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\at_AT\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\at_AT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\at_AT\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\bg_BG\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\bg_BG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\bg_BG\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\bg_BG\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\bg_BG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\bg_BG\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\bg_BG\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\bg_BG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\bg_BG\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\bg_BG\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\bg_BG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\bg_BG\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\bn_BD\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\bn_BD',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\bn_BD\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\bn_BD\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\bn_BD',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\bn_BD\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\bn_BD\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\bn_BD',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\bn_BD\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\bn_BD\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\bn_BD',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\bn_BD\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\bn_BD\\Utils' => 
  array (
    'type' => 'class',
    'classname' => 'Utils',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\bn_BD',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\bn_BD\\Utils',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\cs_CZ\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\cs_CZ',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\cs_CZ\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\cs_CZ\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\cs_CZ',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\cs_CZ\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\cs_CZ\\DateTime' => 
  array (
    'type' => 'class',
    'classname' => 'DateTime',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\cs_CZ',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\cs_CZ\\DateTime',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\cs_CZ\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\cs_CZ',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\cs_CZ\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\cs_CZ\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\cs_CZ',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\cs_CZ\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\cs_CZ\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\cs_CZ',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\cs_CZ\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\cs_CZ\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\cs_CZ',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\cs_CZ\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\cs_CZ\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\cs_CZ',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\cs_CZ\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\da_DK\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\da_DK',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\da_DK\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\da_DK\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\da_DK',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\da_DK\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\da_DK\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\da_DK',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\da_DK\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\da_DK\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\da_DK',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\da_DK\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\da_DK\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\da_DK',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\da_DK\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\da_DK\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\da_DK',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\da_DK\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_AT\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_AT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_AT\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_AT\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_AT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_AT\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_AT\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_AT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_AT\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_AT\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_AT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_AT\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_AT\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_AT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_AT\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_AT\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_AT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_AT\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_AT\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_AT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_AT\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_CH\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_CH\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_CH\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_CH\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_CH\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_CH\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_CH\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_CH\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_CH\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_CH\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_CH\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_CH\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_CH\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_CH\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_DE\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_DE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_DE\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_DE\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_DE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_DE\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_DE\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_DE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_DE\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_DE\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_DE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_DE\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_DE\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_DE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_DE\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_DE\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_DE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_DE\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\de_DE\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\de_DE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\de_DE\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\el_CY\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\el_CY',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\el_CY\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\el_CY\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\el_CY',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\el_CY\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\el_CY\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\el_CY',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\el_CY\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\el_CY\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\el_CY',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\el_CY\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\el_CY\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\el_CY',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\el_CY\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\el_CY\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\el_CY',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\el_CY\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\el_GR\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\el_GR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\el_GR\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\el_GR\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\el_GR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\el_GR\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\el_GR\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\el_GR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\el_GR\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\el_GR\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\el_GR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\el_GR\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\el_GR\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\el_GR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\el_GR\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\el_GR\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\el_GR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\el_GR\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_AU\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_AU',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_AU\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_AU\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_AU',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_AU\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_AU\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_AU',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_AU\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_CA\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_CA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_CA\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_CA\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_CA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_CA\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_GB\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_GB',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_GB\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_GB\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_GB',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_GB\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_GB\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_GB',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_GB\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_GB\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_GB',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_GB\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_GB\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_GB',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_GB\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_GB\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_GB',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_GB\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_HK\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_HK',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_HK\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_HK\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_HK',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_HK\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_HK\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_HK',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_HK\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_IN\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_IN',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_IN\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_IN\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_IN',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_IN\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_IN\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_IN',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_IN\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_IN\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_IN',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_IN\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_NG\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_NG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_NG\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_NG\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_NG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_NG\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_NG\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_NG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_NG\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_NG\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_NG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_NG\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_NZ\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_NZ',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_NZ\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_NZ\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_NZ',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_NZ\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_NZ\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_NZ',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_NZ\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_PH\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_PH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_PH\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_PH\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_PH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_PH\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_SG\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_SG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_SG\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_SG\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_SG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_SG\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_SG\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_SG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_SG\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_UG\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_UG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_UG\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_UG\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_UG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_UG\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_UG\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_UG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_UG\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_UG\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_UG',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_UG\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_US\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_US',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_US\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_US\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_US',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_US\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_US\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_US',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_US\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_US\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_US',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_US\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_US\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_US',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_US\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_US\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_US',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_US\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_ZA\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_ZA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_ZA\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_ZA\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_ZA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_ZA\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_ZA\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_ZA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_ZA\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_ZA\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_ZA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_ZA\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\en_ZA\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\en_ZA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\en_ZA\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_AR\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_AR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_AR\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_AR\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_AR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_AR\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_AR\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_AR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_AR\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_AR\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_AR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_AR\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_ES\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_ES',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_ES\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_ES\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_ES',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_ES\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_ES\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_ES',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_ES\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_ES\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_ES',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_ES\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_ES\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_ES',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_ES\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_ES\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_ES',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_ES\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_ES\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_ES',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_ES\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_ES\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_ES',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_ES\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_PE\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_PE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_PE\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_PE\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_PE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_PE\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_PE\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_PE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_PE\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_PE\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_PE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_PE\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_VE\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_VE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_VE\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_VE\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_VE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_VE\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_VE\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_VE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_VE\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_VE\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_VE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_VE\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\es_VE\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\es_VE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\es_VE\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\et_EE\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\et_EE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\et_EE\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fa_IR\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fa_IR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fa_IR\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fa_IR\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fa_IR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fa_IR\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fa_IR\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fa_IR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fa_IR\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fa_IR\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fa_IR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fa_IR\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fa_IR\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fa_IR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fa_IR\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fa_IR\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fa_IR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fa_IR\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fi_FI\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fi_FI',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fi_FI\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fi_FI\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fi_FI',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fi_FI\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fi_FI\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fi_FI',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fi_FI\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fi_FI\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fi_FI',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fi_FI\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fi_FI\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fi_FI',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fi_FI\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fi_FI\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fi_FI',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fi_FI\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_BE\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_BE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_BE\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_BE\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_BE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_BE\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_BE\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_BE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_BE\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_BE\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_BE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_BE\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_BE\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_BE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_BE\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_BE\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_BE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_BE\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_BE\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_BE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_BE\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_CA\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_CA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_CA\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_CA\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_CA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_CA\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_CA\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_CA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_CA\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_CA\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_CA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_CA\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_CA\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_CA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_CA\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_CH\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_CH\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_CH\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_CH\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_CH\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_CH\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_CH\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_CH\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_CH\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_CH\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_CH\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_CH\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_CH\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_CH\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_CH\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_CH\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_FR\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_FR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_FR\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_FR\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_FR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_FR\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_FR\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_FR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_FR\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_FR\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_FR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_FR\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_FR\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_FR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_FR\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_FR\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_FR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_FR\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_FR\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_FR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_FR\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\fr_FR\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\fr_FR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\fr_FR\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\he_IL\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\he_IL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\he_IL\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\he_IL\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\he_IL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\he_IL\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\he_IL\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\he_IL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\he_IL\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\he_IL\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\he_IL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\he_IL\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\he_IL\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\he_IL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\he_IL\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\hr_HR\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\hr_HR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\hr_HR\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\hr_HR\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\hr_HR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\hr_HR\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\hr_HR\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\hr_HR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\hr_HR\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\hr_HR\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\hr_HR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\hr_HR\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\hr_HR\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\hr_HR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\hr_HR\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\hu_HU\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\hu_HU',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\hu_HU\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\hu_HU\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\hu_HU',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\hu_HU\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\hu_HU\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\hu_HU',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\hu_HU\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\hu_HU\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\hu_HU',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\hu_HU\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\hu_HU\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\hu_HU',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\hu_HU\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\hu_HU\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\hu_HU',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\hu_HU\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\hy_AM\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\hy_AM',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\hy_AM\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\hy_AM\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\hy_AM',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\hy_AM\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\hy_AM\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\hy_AM',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\hy_AM\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\hy_AM\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\hy_AM',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\hy_AM\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\hy_AM\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\hy_AM',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\hy_AM\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\hy_AM\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\hy_AM',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\hy_AM\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\id_ID\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\id_ID',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\id_ID\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\id_ID\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\id_ID',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\id_ID\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\id_ID\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\id_ID',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\id_ID\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\id_ID\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\id_ID',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\id_ID\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\id_ID\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\id_ID',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\id_ID\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\id_ID\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\id_ID',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\id_ID\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\is_IS\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\is_IS',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\is_IS\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\is_IS\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\is_IS',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\is_IS\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\is_IS\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\is_IS',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\is_IS\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\is_IS\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\is_IS',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\is_IS\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\is_IS\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\is_IS',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\is_IS\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\is_IS\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\is_IS',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\is_IS\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\it_CH\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\it_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\it_CH\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\it_CH\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\it_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\it_CH\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\it_CH\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\it_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\it_CH\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\it_CH\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\it_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\it_CH\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\it_CH\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\it_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\it_CH\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\it_CH\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\it_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\it_CH\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\it_CH\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\it_CH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\it_CH\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\it_IT\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\it_IT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\it_IT\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\it_IT\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\it_IT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\it_IT\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\it_IT\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\it_IT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\it_IT\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\it_IT\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\it_IT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\it_IT\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\it_IT\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\it_IT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\it_IT\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\it_IT\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\it_IT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\it_IT\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\it_IT\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\it_IT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\it_IT\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ja_JP\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ja_JP',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ja_JP\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ja_JP\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ja_JP',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ja_JP\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ja_JP\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ja_JP',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ja_JP\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ja_JP\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ja_JP',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ja_JP\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ja_JP\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ja_JP',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ja_JP\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ja_JP\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ja_JP',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ja_JP\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ka_GE\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ka_GE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ka_GE\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ka_GE\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ka_GE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ka_GE\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ka_GE\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ka_GE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ka_GE\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ka_GE\\DateTime' => 
  array (
    'type' => 'class',
    'classname' => 'DateTime',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ka_GE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ka_GE\\DateTime',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ka_GE\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ka_GE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ka_GE\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ka_GE\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ka_GE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ka_GE\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ka_GE\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ka_GE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ka_GE\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ka_GE\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ka_GE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ka_GE\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ka_GE\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ka_GE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ka_GE\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\kk_KZ\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\kk_KZ',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\kk_KZ\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\kk_KZ\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\kk_KZ',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\kk_KZ\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\kk_KZ\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\kk_KZ',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\kk_KZ\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\kk_KZ\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\kk_KZ',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\kk_KZ\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\kk_KZ\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\kk_KZ',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\kk_KZ\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\kk_KZ\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\kk_KZ',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\kk_KZ\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\kk_KZ\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\kk_KZ',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\kk_KZ\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\kk_KZ\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\kk_KZ',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\kk_KZ\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ko_KR\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ko_KR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ko_KR\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ko_KR\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ko_KR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ko_KR\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ko_KR\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ko_KR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ko_KR\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ko_KR\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ko_KR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ko_KR\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ko_KR\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ko_KR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ko_KR\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ko_KR\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ko_KR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ko_KR\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\lt_LT\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\lt_LT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\lt_LT\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\lt_LT\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\lt_LT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\lt_LT\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\lt_LT\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\lt_LT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\lt_LT\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\lt_LT\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\lt_LT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\lt_LT\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\lt_LT\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\lt_LT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\lt_LT\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\lt_LT\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\lt_LT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\lt_LT\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\lv_LV\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\lv_LV',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\lv_LV\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\lv_LV\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\lv_LV',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\lv_LV\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\lv_LV\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\lv_LV',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\lv_LV\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\lv_LV\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\lv_LV',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\lv_LV\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\lv_LV\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\lv_LV',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\lv_LV\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\lv_LV\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\lv_LV',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\lv_LV\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\me_ME\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\me_ME',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\me_ME\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\me_ME\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\me_ME',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\me_ME\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\me_ME\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\me_ME',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\me_ME\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\me_ME\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\me_ME',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\me_ME\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\me_ME\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\me_ME',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\me_ME\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\mn_MN\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\mn_MN',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\mn_MN\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\mn_MN\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\mn_MN',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\mn_MN\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ms_MY\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ms_MY',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ms_MY\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ms_MY\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ms_MY',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ms_MY\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ms_MY\\Miscellaneous' => 
  array (
    'type' => 'class',
    'classname' => 'Miscellaneous',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ms_MY',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ms_MY\\Miscellaneous',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ms_MY\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ms_MY',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ms_MY\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ms_MY\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ms_MY',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ms_MY\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ms_MY\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ms_MY',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ms_MY\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\nb_NO\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\nb_NO',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\nb_NO\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\nb_NO\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\nb_NO',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\nb_NO\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\nb_NO\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\nb_NO',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\nb_NO\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\nb_NO\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\nb_NO',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\nb_NO\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\nb_NO\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\nb_NO',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\nb_NO\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ne_NP\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ne_NP',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ne_NP\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ne_NP\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ne_NP',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ne_NP\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ne_NP\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ne_NP',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ne_NP\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ne_NP\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ne_NP',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ne_NP\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ne_NP\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ne_NP',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ne_NP\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\nl_BE\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\nl_BE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\nl_BE\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\nl_BE\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\nl_BE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\nl_BE\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\nl_BE\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\nl_BE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\nl_BE\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\nl_BE\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\nl_BE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\nl_BE\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\nl_BE\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\nl_BE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\nl_BE\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\nl_BE\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\nl_BE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\nl_BE\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\nl_BE\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\nl_BE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\nl_BE\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\nl_NL\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\nl_NL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\nl_NL\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\nl_NL\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\nl_NL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\nl_NL\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\nl_NL\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\nl_NL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\nl_NL\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\nl_NL\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\nl_NL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\nl_NL\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\nl_NL\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\nl_NL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\nl_NL\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\nl_NL\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\nl_NL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\nl_NL\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\nl_NL\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\nl_NL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\nl_NL\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\nl_NL\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\nl_NL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\nl_NL\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pl_PL\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pl_PL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pl_PL\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pl_PL\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pl_PL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pl_PL\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pl_PL\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pl_PL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pl_PL\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pl_PL\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pl_PL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pl_PL\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pl_PL\\LicensePlate' => 
  array (
    'type' => 'class',
    'classname' => 'LicensePlate',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pl_PL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pl_PL\\LicensePlate',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pl_PL\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pl_PL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pl_PL\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pl_PL\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pl_PL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pl_PL\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pl_PL\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pl_PL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pl_PL\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pl_PL\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pl_PL',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pl_PL\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pt_BR\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pt_BR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pt_BR\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pt_BR\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pt_BR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pt_BR\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pt_BR\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pt_BR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pt_BR\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pt_BR\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pt_BR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pt_BR\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pt_BR\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pt_BR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pt_BR\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pt_BR\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pt_BR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pt_BR\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pt_BR\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pt_BR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pt_BR\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pt_PT\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pt_PT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pt_PT\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pt_PT\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pt_PT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pt_PT\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pt_PT\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pt_PT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pt_PT\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pt_PT\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pt_PT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pt_PT\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pt_PT\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pt_PT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pt_PT\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\pt_PT\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\pt_PT',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\pt_PT\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ro_MD\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ro_MD',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ro_MD\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ro_MD\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ro_MD',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ro_MD\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ro_MD\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ro_MD',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ro_MD\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ro_MD\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ro_MD',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ro_MD\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ro_MD\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ro_MD',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ro_MD\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ro_RO\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ro_RO',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ro_RO\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ro_RO\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ro_RO',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ro_RO\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ro_RO\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ro_RO',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ro_RO\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ro_RO\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ro_RO',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ro_RO\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ro_RO\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ro_RO',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ro_RO\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ru_RU\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ru_RU',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ru_RU\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ru_RU\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ru_RU',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ru_RU\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ru_RU\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ru_RU',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ru_RU\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ru_RU\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ru_RU',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ru_RU\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ru_RU\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ru_RU',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ru_RU\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ru_RU\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ru_RU',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ru_RU\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ru_RU\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ru_RU',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ru_RU\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\ru_RU\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\ru_RU',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\ru_RU\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sk_SK\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sk_SK',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sk_SK\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sk_SK\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sk_SK',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sk_SK\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sk_SK\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sk_SK',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sk_SK\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sk_SK\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sk_SK',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sk_SK\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sk_SK\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sk_SK',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sk_SK\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sk_SK\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sk_SK',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sk_SK\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sl_SI\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sl_SI',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sl_SI\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sl_SI\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sl_SI',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sl_SI\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sl_SI\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sl_SI',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sl_SI\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sl_SI\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sl_SI',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sl_SI\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sl_SI\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sl_SI',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sl_SI\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sl_SI\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sl_SI',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sl_SI\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sr_Cyrl_RS\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sr_Cyrl_RS',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sr_Cyrl_RS\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sr_Cyrl_RS\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sr_Cyrl_RS',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sr_Cyrl_RS\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sr_Cyrl_RS\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sr_Cyrl_RS',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sr_Cyrl_RS\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sr_Latn_RS\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sr_Latn_RS',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sr_Latn_RS\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sr_Latn_RS\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sr_Latn_RS',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sr_Latn_RS\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sr_Latn_RS\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sr_Latn_RS',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sr_Latn_RS\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sr_RS\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sr_RS',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sr_RS\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sr_RS\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sr_RS',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sr_RS\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sr_RS\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sr_RS',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sr_RS\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sv_SE\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sv_SE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sv_SE\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sv_SE\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sv_SE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sv_SE\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sv_SE\\Municipality' => 
  array (
    'type' => 'class',
    'classname' => 'Municipality',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sv_SE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sv_SE\\Municipality',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sv_SE\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sv_SE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sv_SE\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sv_SE\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sv_SE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sv_SE\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\sv_SE\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\sv_SE',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\sv_SE\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\th_TH\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\th_TH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\th_TH\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\th_TH\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\th_TH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\th_TH\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\th_TH\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\th_TH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\th_TH\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\th_TH\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\th_TH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\th_TH\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\th_TH\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\th_TH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\th_TH\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\th_TH\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\th_TH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\th_TH\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\th_TH\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\th_TH',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\th_TH\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\tr_TR\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\tr_TR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\tr_TR\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\tr_TR\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\tr_TR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\tr_TR\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\tr_TR\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\tr_TR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\tr_TR\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\tr_TR\\DateTime' => 
  array (
    'type' => 'class',
    'classname' => 'DateTime',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\tr_TR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\tr_TR\\DateTime',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\tr_TR\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\tr_TR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\tr_TR\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\tr_TR\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\tr_TR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\tr_TR\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\tr_TR\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\tr_TR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\tr_TR\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\tr_TR\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\tr_TR',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\tr_TR\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\uk_UA\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\uk_UA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\uk_UA\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\uk_UA\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\uk_UA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\uk_UA\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\uk_UA\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\uk_UA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\uk_UA\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\uk_UA\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\uk_UA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\uk_UA\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\uk_UA\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\uk_UA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\uk_UA\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\uk_UA\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\uk_UA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\uk_UA\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\uk_UA\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\uk_UA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\uk_UA\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\uk_UA\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\uk_UA',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\uk_UA\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\vi_VN\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\vi_VN',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\vi_VN\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\vi_VN\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\vi_VN',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\vi_VN\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\vi_VN\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\vi_VN',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\vi_VN\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\vi_VN\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\vi_VN',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\vi_VN\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\vi_VN\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\vi_VN',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\vi_VN\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\zh_CN\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\zh_CN',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\zh_CN\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\zh_CN\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\zh_CN',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\zh_CN\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\zh_CN\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\zh_CN',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\zh_CN\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\zh_CN\\DateTime' => 
  array (
    'type' => 'class',
    'classname' => 'DateTime',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\zh_CN',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\zh_CN\\DateTime',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\zh_CN\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\zh_CN',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\zh_CN\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\zh_CN\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\zh_CN',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\zh_CN\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\zh_CN\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\zh_CN',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\zh_CN\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\zh_CN\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\zh_CN',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\zh_CN\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\zh_TW\\Address' => 
  array (
    'type' => 'class',
    'classname' => 'Address',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\zh_TW',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\zh_TW\\Address',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\zh_TW\\Color' => 
  array (
    'type' => 'class',
    'classname' => 'Color',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\zh_TW',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\zh_TW\\Color',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\zh_TW\\Company' => 
  array (
    'type' => 'class',
    'classname' => 'Company',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\zh_TW',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\zh_TW\\Company',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\zh_TW\\DateTime' => 
  array (
    'type' => 'class',
    'classname' => 'DateTime',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\zh_TW',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\zh_TW\\DateTime',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\zh_TW\\Internet' => 
  array (
    'type' => 'class',
    'classname' => 'Internet',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\zh_TW',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\zh_TW\\Internet',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\zh_TW\\Payment' => 
  array (
    'type' => 'class',
    'classname' => 'Payment',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\zh_TW',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\zh_TW\\Payment',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\zh_TW\\Person' => 
  array (
    'type' => 'class',
    'classname' => 'Person',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\zh_TW',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\zh_TW\\Person',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\zh_TW\\PhoneNumber' => 
  array (
    'type' => 'class',
    'classname' => 'PhoneNumber',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\zh_TW',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\zh_TW\\PhoneNumber',
    'implements' => 
    array (
    ),
  ),
  'Faker\\Provider\\zh_TW\\Text' => 
  array (
    'type' => 'class',
    'classname' => 'Text',
    'isabstract' => false,
    'namespace' => 'Faker\\Provider\\zh_TW',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\Provider\\zh_TW\\Text',
    'implements' => 
    array (
    ),
  ),
  'Faker\\UniqueGenerator' => 
  array (
    'type' => 'class',
    'classname' => 'UniqueGenerator',
    'isabstract' => false,
    'namespace' => 'Faker',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\UniqueGenerator',
    'implements' => 
    array (
    ),
  ),
  'Faker\\ValidGenerator' => 
  array (
    'type' => 'class',
    'classname' => 'ValidGenerator',
    'isabstract' => false,
    'namespace' => 'Faker',
    'extends' => 'FakerPress\\ThirdParty\\Faker\\ValidGenerator',
    'implements' => 
    array (
    ),
  ),
  'lucatume\\DI52\\App' => 
  array (
    'type' => 'class',
    'classname' => 'App',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52',
    'extends' => 'FakerPress\\ThirdParty\\lucatume\\DI52\\App',
    'implements' => 
    array (
    ),
  ),
  'lucatume\\DI52\\Builders\\CallableBuilder' => 
  array (
    'type' => 'class',
    'classname' => 'CallableBuilder',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52\\Builders',
    'extends' => 'FakerPress\\ThirdParty\\lucatume\\DI52\\Builders\\CallableBuilder',
    'implements' => 
    array (
      0 => 'lucatume\\DI52\\Builders\\BuilderInterface',
      1 => 'lucatume\\DI52\\Builders\\ReinitializableBuilderInterface',
    ),
  ),
  'lucatume\\DI52\\Builders\\ClassBuilder' => 
  array (
    'type' => 'class',
    'classname' => 'ClassBuilder',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52\\Builders',
    'extends' => 'FakerPress\\ThirdParty\\lucatume\\DI52\\Builders\\ClassBuilder',
    'implements' => 
    array (
      0 => 'lucatume\\DI52\\Builders\\BuilderInterface',
      1 => 'lucatume\\DI52\\Builders\\ReinitializableBuilderInterface',
    ),
  ),
  'lucatume\\DI52\\Builders\\ClosureBuilder' => 
  array (
    'type' => 'class',
    'classname' => 'ClosureBuilder',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52\\Builders',
    'extends' => 'FakerPress\\ThirdParty\\lucatume\\DI52\\Builders\\ClosureBuilder',
    'implements' => 
    array (
      0 => 'lucatume\\DI52\\Builders\\BuilderInterface',
    ),
  ),
  'lucatume\\DI52\\Builders\\Factory' => 
  array (
    'type' => 'class',
    'classname' => 'Factory',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52\\Builders',
    'extends' => 'FakerPress\\ThirdParty\\lucatume\\DI52\\Builders\\Factory',
    'implements' => 
    array (
    ),
  ),
  'lucatume\\DI52\\Builders\\Parameter' => 
  array (
    'type' => 'class',
    'classname' => 'Parameter',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52\\Builders',
    'extends' => 'FakerPress\\ThirdParty\\lucatume\\DI52\\Builders\\Parameter',
    'implements' => 
    array (
    ),
  ),
  'lucatume\\DI52\\Builders\\Resolver' => 
  array (
    'type' => 'class',
    'classname' => 'Resolver',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52\\Builders',
    'extends' => 'FakerPress\\ThirdParty\\lucatume\\DI52\\Builders\\Resolver',
    'implements' => 
    array (
    ),
  ),
  'lucatume\\DI52\\Builders\\ValueBuilder' => 
  array (
    'type' => 'class',
    'classname' => 'ValueBuilder',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52\\Builders',
    'extends' => 'FakerPress\\ThirdParty\\lucatume\\DI52\\Builders\\ValueBuilder',
    'implements' => 
    array (
      0 => 'lucatume\\DI52\\Builders\\BuilderInterface',
    ),
  ),
  'lucatume\\DI52\\Container' => 
  array (
    'type' => 'class',
    'classname' => 'Container',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52',
    'extends' => 'FakerPress\\ThirdParty\\lucatume\\DI52\\Container',
    'implements' => 
    array (
      0 => 'ArrayAccess',
      1 => 'Psr\\Container\\ContainerInterface',
    ),
  ),
  'lucatume\\DI52\\ContainerException' => 
  array (
    'type' => 'class',
    'classname' => 'ContainerException',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52',
    'extends' => 'FakerPress\\ThirdParty\\lucatume\\DI52\\ContainerException',
    'implements' => 
    array (
      0 => 'Psr\\Container\\ContainerExceptionInterface',
    ),
  ),
  'lucatume\\DI52\\NestedParseError' => 
  array (
    'type' => 'class',
    'classname' => 'NestedParseError',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52',
    'extends' => 'FakerPress\\ThirdParty\\lucatume\\DI52\\NestedParseError',
    'implements' => 
    array (
    ),
  ),
  'lucatume\\DI52\\NotFoundException' => 
  array (
    'type' => 'class',
    'classname' => 'NotFoundException',
    'isabstract' => false,
    'namespace' => 'lucatume\\DI52',
    'extends' => 'FakerPress\\ThirdParty\\lucatume\\DI52\\NotFoundException',
    'implements' => 
    array (
      0 => 'Psr\\Container\\NotFoundExceptionInterface',
    ),
  ),
  'lucatume\\DI52\\ServiceProvider' => 
  array (
    'type' => 'class',
    'classname' => 'ServiceProvider',
    'isabstract' => true,
    'namespace' => 'lucatume\\DI52',
    'extends' => 'FakerPress\\ThirdParty\\lucatume\\DI52\\ServiceProvider',
    'implements' => 
    array (
    ),
  ),
  'Cake\\Chronos\\FormattingTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'FormattingTrait',
    'namespace' => 'Cake\\Chronos',
    'use' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Cake\\Chronos\\FormattingTrait',
    ),
  ),
  'Faker\\Extension\\GeneratorAwareExtensionTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'GeneratorAwareExtensionTrait',
    'namespace' => 'Faker\\Extension',
    'use' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Faker\\Extension\\GeneratorAwareExtensionTrait',
    ),
  ),
  'Cake\\Chronos\\DifferenceFormatterInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'DifferenceFormatterInterface',
    'namespace' => 'Cake\\Chronos',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Cake\\Chronos\\DifferenceFormatterInterface',
    ),
  ),
  'Faker\\Container\\ContainerInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ContainerInterface',
    'namespace' => 'Faker\\Container',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Faker\\Container\\ContainerInterface',
    ),
  ),
  'Faker\\Extension\\AddressExtension' => 
  array (
    'type' => 'interface',
    'interfacename' => 'AddressExtension',
    'namespace' => 'Faker\\Extension',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Faker\\Extension\\AddressExtension',
    ),
  ),
  'Faker\\Extension\\BarcodeExtension' => 
  array (
    'type' => 'interface',
    'interfacename' => 'BarcodeExtension',
    'namespace' => 'Faker\\Extension',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Faker\\Extension\\BarcodeExtension',
    ),
  ),
  'Faker\\Extension\\BloodExtension' => 
  array (
    'type' => 'interface',
    'interfacename' => 'BloodExtension',
    'namespace' => 'Faker\\Extension',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Faker\\Extension\\BloodExtension',
    ),
  ),
  'Faker\\Extension\\ColorExtension' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ColorExtension',
    'namespace' => 'Faker\\Extension',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Faker\\Extension\\ColorExtension',
    ),
  ),
  'Faker\\Extension\\CompanyExtension' => 
  array (
    'type' => 'interface',
    'interfacename' => 'CompanyExtension',
    'namespace' => 'Faker\\Extension',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Faker\\Extension\\CompanyExtension',
    ),
  ),
  'Faker\\Extension\\CountryExtension' => 
  array (
    'type' => 'interface',
    'interfacename' => 'CountryExtension',
    'namespace' => 'Faker\\Extension',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Faker\\Extension\\CountryExtension',
    ),
  ),
  'Faker\\Extension\\DateTimeExtension' => 
  array (
    'type' => 'interface',
    'interfacename' => 'DateTimeExtension',
    'namespace' => 'Faker\\Extension',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Faker\\Extension\\DateTimeExtension',
    ),
  ),
  'Faker\\Extension\\Extension' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Extension',
    'namespace' => 'Faker\\Extension',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Faker\\Extension\\Extension',
    ),
  ),
  'Faker\\Extension\\FileExtension' => 
  array (
    'type' => 'interface',
    'interfacename' => 'FileExtension',
    'namespace' => 'Faker\\Extension',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Faker\\Extension\\FileExtension',
    ),
  ),
  'Faker\\Extension\\GeneratorAwareExtension' => 
  array (
    'type' => 'interface',
    'interfacename' => 'GeneratorAwareExtension',
    'namespace' => 'Faker\\Extension',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Faker\\Extension\\GeneratorAwareExtension',
    ),
  ),
  'Faker\\Extension\\NumberExtension' => 
  array (
    'type' => 'interface',
    'interfacename' => 'NumberExtension',
    'namespace' => 'Faker\\Extension',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Faker\\Extension\\NumberExtension',
    ),
  ),
  'Faker\\Extension\\PersonExtension' => 
  array (
    'type' => 'interface',
    'interfacename' => 'PersonExtension',
    'namespace' => 'Faker\\Extension',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Faker\\Extension\\PersonExtension',
    ),
  ),
  'Faker\\Extension\\PhoneNumberExtension' => 
  array (
    'type' => 'interface',
    'interfacename' => 'PhoneNumberExtension',
    'namespace' => 'Faker\\Extension',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Faker\\Extension\\PhoneNumberExtension',
    ),
  ),
  'Faker\\Extension\\UuidExtension' => 
  array (
    'type' => 'interface',
    'interfacename' => 'UuidExtension',
    'namespace' => 'Faker\\Extension',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Faker\\Extension\\UuidExtension',
    ),
  ),
  'Faker\\Extension\\VersionExtension' => 
  array (
    'type' => 'interface',
    'interfacename' => 'VersionExtension',
    'namespace' => 'Faker\\Extension',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Faker\\Extension\\VersionExtension',
    ),
  ),
  'lucatume\\DI52\\Builders\\BuilderInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'BuilderInterface',
    'namespace' => 'lucatume\\DI52\\Builders',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\lucatume\\DI52\\Builders\\BuilderInterface',
    ),
  ),
  'lucatume\\DI52\\Builders\\ReinitializableBuilderInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ReinitializableBuilderInterface',
    'namespace' => 'lucatume\\DI52\\Builders',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\lucatume\\DI52\\Builders\\ReinitializableBuilderInterface',
    ),
  ),
  'Psr\\Clock\\ClockInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ClockInterface',
    'namespace' => 'Psr\\Clock',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Psr\\Clock\\ClockInterface',
    ),
  ),
  'Psr\\Container\\ContainerExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ContainerExceptionInterface',
    'namespace' => 'Psr\\Container',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Psr\\Container\\ContainerExceptionInterface',
    ),
  ),
  'Psr\\Container\\ContainerInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'ContainerInterface',
    'namespace' => 'Psr\\Container',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Psr\\Container\\ContainerInterface',
    ),
  ),
  'Psr\\Container\\NotFoundExceptionInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'NotFoundExceptionInterface',
    'namespace' => 'Psr\\Container',
    'extends' => 
    array (
      0 => 'FakerPress\\ThirdParty\\Psr\\Container\\NotFoundExceptionInterface',
    ),
  ),
);

        public function __construct()
        {
            $this->includeFilePath = __DIR__ . '/autoload_alias.php';
        }

        /**
         * @param string $class
         */
        public function autoload($class): void
        {
            if (!isset($this->autoloadAliases[$class])) {
                return;
            }
            switch ($this->autoloadAliases[$class]['type']) {
                case 'class':
                        $this->load(
                            $this->classTemplate(
                                $this->autoloadAliases[$class]
                            )
                        );
                    break;
                case 'interface':
                    $this->load(
                        $this->interfaceTemplate(
                            $this->autoloadAliases[$class]
                        )
                    );
                    break;
                case 'trait':
                    $this->load(
                        $this->traitTemplate(
                            $this->autoloadAliases[$class]
                        )
                    );
                    break;
                default:
                    // Never.
                    break;
            }
        }

        private function load(string $includeFile): void
        {
            file_put_contents($this->includeFilePath, $includeFile);
            include $this->includeFilePath;
            file_exists($this->includeFilePath) && unlink($this->includeFilePath);
        }

        /**
         * @param ClassAliasArray $class
         */
        private function classTemplate(array $class): string
        {
            $abstract = $class['isabstract'] ? 'abstract ' : '';
            $classname = $class['classname'];
            if (isset($class['namespace'])) {
                $namespace = "namespace {$class['namespace']};";
                $extends = '\\' . $class['extends'];
                $implements = empty($class['implements']) ? ''
                : ' implements \\' . implode(', \\', $class['implements']);
            } else {
                $namespace = '';
                $extends = $class['extends'];
                $implements = !empty($class['implements']) ? ''
                : ' implements ' . implode(', ', $class['implements']);
            }
            return <<<EOD
                <?php
                $namespace
                $abstract class $classname extends $extends $implements {}
                EOD;
        }

        /**
         * @param InterfaceAliasArray $interface
         */
        private function interfaceTemplate(array $interface): string
        {
            $interfacename = $interface['interfacename'];
            $namespace = isset($interface['namespace'])
            ? "namespace {$interface['namespace']};" : '';
            $extends = isset($interface['namespace'])
            ? '\\' . implode('\\ ,', $interface['extends'])
            : implode(', ', $interface['extends']);
            return <<<EOD
                <?php
                $namespace
                interface $interfacename extends $extends {}
                EOD;
        }

        /**
         * @param TraitAliasArray $trait
         */
        private function traitTemplate(array $trait): string
        {
            $traitname = $trait['traitname'];
            $namespace = isset($trait['namespace'])
            ? "namespace {$trait['namespace']};" : '';
            $uses = isset($trait['namespace'])
            ? '\\' . implode(';' . PHP_EOL . '    use \\', $trait['use'])
            : implode(';' . PHP_EOL . '    use ', $trait['use']);
            return <<<EOD
                <?php
                $namespace
                trait $traitname { 
                    use $uses; 
                }
                EOD;
        }
    }

    spl_autoload_register([ new AliasAutoloader(), 'autoload' ]);
}
