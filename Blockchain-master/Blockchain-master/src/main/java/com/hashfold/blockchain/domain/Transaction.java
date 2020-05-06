package com.hashfold.blockchain.domain;

import java.math.BigDecimal;

import javax.validation.constraints.NotNull;

import org.hibernate.validator.constraints.NotEmpty;

import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.io.Serializable;
import javax.annotation.PostConstruct;
import org.springframework.stereotype.Component;

/**
 * Represents a transaction event in the Block.
 * 
 * @author Praveendra Singh
 *
 */
@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
@Component

public class Transaction  implements Serializable
{
     @NotEmpty
     private String sender;
        
     @NotEmpty
     private String recipient;
         
     @NotNull
     private BigDecimal amount;
     
     @NotEmpty
     private String aadhar;
     
     @NotEmpty
     private String election;
     
     @NotEmpty
     private String etype;
     
     @NotEmpty
     private String esub;
     
     @NotEmpty
     private String candidate;

              
}
     
     
